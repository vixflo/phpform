<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

$currentStep = 1; // default if nothing posted
$formId = '';

if (isset($_POST['back-btn'])) {
    $currentStep = $_POST['back-btn'];
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form-step-1']) && Form::testToken('form-step-1') === true) {
        /* Validate step 1 */

        // create validator & auto-validate required fields
        $validator = Form::validate('form-step-1');

        // additional validation
        $validator->notStartsWith('robot', Form::buildAlert('Sorry I don\' like robots ...', 'uikit', 'danger'))->validate('human-or-robot');
        if ($validator->hasErrors()) {
            $currentStep = 1;
            $_SESSION['errors']['form-step-1'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('form-step-1');
            $currentStep = 2;
        }
    } elseif (isset($_POST['form-step-2']) && Form::testToken('form-step-2') === true) {
        /* Validate step 2 */

        // create validator & auto-validate required fields
        $validator = Form::validate('form-step-2');
        if ($validator->hasErrors()) {
            $currentStep = 2;
            $_SESSION['errors']['form-step-2'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('form-step-2');
            $currentStep = 3;
        }
    } elseif (isset($_POST['form-step-3']) && Form::testToken('form-step-3') === true) {
        /* Validate step 3 */

        // create validator & auto-validate required fields
        $validator = Form::validate('form-step-3');

        // additional validation
        $validator->email()->validate('user-email');
        if ($validator->hasErrors()) {
            $currentStep = 3;
            $_SESSION['errors']['form-step-3'] = $validator->getAllErrors();
        } elseif ($_POST['are-informations-correct'] < 1) { // back to step 1 with user message (wrong informations)
            $currentStep = 1;
            $userMessage = Form::buildAlert('<strong>Wrong informations ! </strong> Please try again ...', 'uikit', 'warning');
        } else { // send email & go back to step 1 with user message (email sended)
            Form::registerValues('form-step-3');
            $userValues = Form::mergeValues(array('form-step-1', 'form-step-2', 'form-step-3'));

            /* translate boolean values to text */

            $find                                    = array('/0/', '/1/');
            $replace                                 = array('No', 'Yes');
            $userValues['human-or-robot']           = preg_replace($find, $replace, $userValues['human-or-robot']);
            $userValues['are-informations-correct'] = preg_replace($find, $replace, $userValues['are-informations-correct']);

            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => addslashes($_POST['user-email']),
                'subject'         => 'contact from Php Form Builder',
                'values'          => $userValues,
                'filter_values'   => 'form-step-1, form-step-2, form-step-3'
            );
            $userMessage = Form::sendMail($emailConfig);
            $currentStep = 1;
        }
    }
}
if ($currentStep == 1) {
    /* ==================================================
        Step 1
    ================================================== */

    $formId = 'form-step-1';
    $form = new Form('form-step-1', 'horizontal', 'novalidate', 'uikit');
    $form->setMode('development');
    $form->addRadio('human-or-robot', 'I\'m a real human', 'real human');
    $form->addRadio('human-or-robot', 'I\'m a robot', 'robot');
    $form->printRadioGroup('human-or-robot', 'Are you a human or a robot ?', false, 'required');
    $form->setCols(0, 12);
    $form->centerContent();
    $form->addBtn('submit', 'submit-btn', 1, 'Next <i class="uk-icon fas fa-arrow-right uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in');
} elseif ($currentStep == 2) {
    /* ==================================================
        Step 2
    ================================================== */

    $formId = 'form-step-2';
    $form = new Form('form-step-2', 'horizontal', 'novalidate', 'uikit');
    $form->setMode('development');
    $form->addOption('how-did-you-come-here', 'By foot', 'By foot');
    $form->addOption('how-did-you-come-here', 'By plane', 'By plane');
    $form->addOption('how-did-you-come-here', 'By car', 'By car');
    $form->addOption('how-did-you-come-here', 'By boat', 'By boat');
    $form->addOption('how-did-you-come-here', 'By bike', 'By bike');
    $form->addSelect('how-did-you-come-here', 'How did you come here ?', 'data-slimselect=true, required');
    $form->setCols(0, 12);
    $form->centerContent();
    $form->addBtn('submit', 'back-btn', 1, '<i class="uk-icon fas fa-arrow-left uk-margin-right" aria-hidden="true"></i> Back', 'class=uk-button uk-button-default', 'btns');
    $form->addBtn('submit', 'submit-btn', 2, 'Next <i class="uk-icon fas fa-arrow-right uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');
} elseif ($currentStep == 3) {
    /* ==================================================
        Step 3
    ================================================== */

    $formId = 'form-step-3';
    $form = new Form('form-step-3', 'horizontal', 'novalidate', 'uikit');
    $form->setMode('development');
    $form->addHtml('<p class="lead"><strong>You are human, you came here ' . strtolower($_SESSION['form-step-2']['how-did-you-come-here']) . '.</strong></p>');
    $form->addRadio('are-informations-correct', 'Yes, Excellent', 1);
    $form->addRadio('are-informations-correct', 'Absolutely not', 0);
    $form->printRadioGroup('are-informations-correct', 'Are these informations correct ?', false, 'required');
    $form->addHelper('Enter your real e-mail if you want to receive results', 'user-email');
    $form->addInput('email', 'user-email', '', 'E-mail', 'required');
    $form->setCols(0, 12);
    $form->centerContent();
    $form->addBtn('submit', 'back-btn', 2, '<i class="uk-icon fas fa-arrow-left uk-margin-right" aria-hidden="true"></i> Back', 'class=uk-button uk-button-default', 'btns');
    $form->addBtn('submit', 'submit-btn', 3, 'Submit <i class="uk-icon fas fa-arrow-right uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');
}

if (isset($form) && $form instanceof Form) {
    $form->addPlugin('pretty-checkbox', '#' . $formId, 'default', ['color' => 'info']);

    // Javascript validation
    $form->addPlugin('formvalidation', '#' . $formId);
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Simple Step Form - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create a simple Step Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/simple-step-form.php" />

    <!-- UIkit CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

    <!-- Font awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
    <style>
        /* custom styles for demo */
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <h1 class="uk-text-center">Php Form Builder - Simple Step Form<br><small>follow steps to complete</small></h1>

    <div class="uk-container" style="min-width:70vw;">

        <?php
        if (isset($userMessage)) {
            echo $userMessage;
        }
        ?>
        <h2 class="uk-text-center uk-margin-large-bottom">Simple Step Form</h2>
        <?php
        $form->render();
        ?>
    </div>

    <!-- UIkit JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
            // destroy the validator if we click a back button
            if (document.querySelector('button[name="back-btn"]')) {
                document.querySelector('button[name="back-btn"]').addEventListener('click', function() {
                    var form = forms['<?php echo $formId; ?>'];
                    form.fv.deregisterPlugin('___frameworkMessage');
                    form.fv.destroy();
                });
            }
        });
    </script>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
