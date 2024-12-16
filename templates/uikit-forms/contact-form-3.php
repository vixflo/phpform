<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-3') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-3');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-3'] = $validator->getAllErrors();
        // var_dump($_SESSION['errors']['contact-form-3']);
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-3'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-3');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-3', 'horizontal', 'novalidate', 'uikit');
$form->setMode('development');
$form->setCols(0, 12);
$form->startFieldset('Please fill in this form to contact us', 'class=uk-fieldset', 'class=uk-legend uk-margin-bottom');
$form->setCols(0, 6);
$form->groupElements('user-name', 'user-first-name');
$form->addIcon('user-name', '<i class="uk-form-icon fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name*, required');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="uk-form-icon fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="uk-form-icon fas fa-phone" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addHelper('If other, please tell us more ... ', 'subject');
$form->addOption('subject', '', 'Your request concerns ...');
$form->addOption('subject', 'Support', 'Support', '', 'data-icon=uk-icon fas fa-info uk-margin-right uk-text-info');
$form->addOption('subject', 'Sales', 'Sales', '', 'data-icon=uk-icon fas fa-dollar-sign uk-margin-right uk-text-warning');
$form->addOption('subject', 'Other', 'Other', '', 'data-icon=uk-icon fas fa-question uk-margin-right uk-text-danger');
$form->addSelect('subject', '', 'data-slimselect=true');
$form->startDependentFields('subject', 'Other');
$form->addInput('text', 'subject-other', '', '', 'placeholder=Please tell more about your request ..., required');
$form->endDependentFields();
$form->addTextarea('message', '', '', 'placeholder=Your message ..., rows=7, required');
$form->addPlugin('tinymce', '#message');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', 1);
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=uk-background-primary');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="uk-icon fas fa-envelope uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary uk-button-large, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="uk-text-warning">* Required fields</p>');

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-3');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Contact Form with Rich Text Editor - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create a Contact Form with Rich Text Editor using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/contact-form-3.php" />

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
</head>

<body>

    <h1 class="uk-text-center">Php Form Builder - Contact Form<br><small>with Rich Text Editor and Dependent Field</small></h1>

    <div class="uk-container" style="min-width:70vw;">

        <?php
        if (isset($sentMessage)) {
            echo $sentMessage;
        }
        $form->render();
        ?>
    </div>

    <!-- UIkit JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>

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
