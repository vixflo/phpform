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
        $validator->notStartsWith('robot', Form::buildAlert('Sorry I don\' like robots ...', 'material', 'danger'))->validate('human-or-robot');
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
            $userMessage = Form::buildAlert('<strong>Wrong informations ! </strong> Please try again ...', 'material', 'warning');
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
    $form = new Form('form-step-1', 'horizontal', 'novalidate', 'material');
    $form->setMode('development');
    $form->addRadio('human-or-robot', 'I\'m a real human', 'real human');
    $form->addRadio('human-or-robot', 'I\'m a robot', 'robot');
    $form->printRadioGroup('human-or-robot', 'Are you a human or a robot ?', false, 'required');
    $form->centerContent();
    $form->addBtn('submit', 'submit-btn', 1, 'Next <i class="material-icons right" aria-hidden="true">arrow_right</i>', 'class=btn btn-small btn-primary , data-ladda-button=true, data-style=zoom-in');
} elseif ($currentStep == 2) {
    /* ==================================================
        Step 2
    ================================================== */

    $formId = 'form-step-2';
    $form = new Form('form-step-2', 'horizontal', 'novalidate', 'material');
    $form->setMode('development');
    $form->addOption('how-did-you-come-here', 'By foot', 'By foot');
    $form->addOption('how-did-you-come-here', 'By plane', 'By plane');
    $form->addOption('how-did-you-come-here', 'By car', 'By car');
    $form->addOption('how-did-you-come-here', 'By boat', 'By boat');
    $form->addOption('how-did-you-come-here', 'By bike', 'By bike');
    $form->addSelect('how-did-you-come-here', 'How did you come here ?', 'data-slimselect=true show-tick, required');
    $form->centerContent();
    $form->addBtn('submit', 'back-btn', 1, '<i class="material-icons left" aria-hidden="true">arrow_left</i> Back', 'class=btn btn-small btn-warning', 'btns');
    $form->addBtn('submit', 'submit-btn', 2, 'Next <i class="material-icons right" aria-hidden="true">arrow_right</i>', 'class=btn btn-small btn-primary, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');
} elseif ($currentStep == 3) {
    /* ==================================================
        Step 3
    ================================================== */

    $formId = 'form-step-3';
    $form = new Form('form-step-3', 'horizontal', 'novalidate', 'material');
    $form->setMode('development');
    $form->addHtml('<p class="lead"><strong>You are human, you came here ' . strtolower($_SESSION['form-step-2']['how-did-you-come-here']) . '.</strong></p>');
    $form->addRadio('are-informations-correct', 'Yes, Excellent', 1);
    $form->addRadio('are-informations-correct', 'Absolutely not', 0);
    $form->printRadioGroup('are-informations-correct', 'Are these informations correct ?', false, 'required');
    $form->addHelper('Enter your real e-mail if you want to receive results', 'user-email');
    $form->addInput('email', 'user-email', '', 'E-mail', 'required');
    $form->centerContent();
    $form->addBtn('submit', 'back-btn', 2, '<i class="material-icons left" aria-hidden="true">arrow_left</i> Back', 'class=btn btn-small btn-warning', 'btns');
    $form->addBtn('submit', 'submit-btn', 3, 'Submit <i class="material-icons right" aria-hidden="true">arrow_right</i>', 'class=btn btn-small btn-primary, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');
}

if (isset($form) && $form instanceof Form) {
    $form->addPlugin('icheck', 'input', 'default', array('theme' => 'square', 'color' => 'green'));

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
    <title>Material Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Sign Up Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/sign-up-form.php" />

    <!-- Materialize CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material icons CSS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Sign Up Form<br><small>Fill-in this form to sigh up</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                $form->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#sign-up-form-1'));
        });
    </script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>