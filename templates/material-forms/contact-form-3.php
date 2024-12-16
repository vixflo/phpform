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

$form = new Form('contact-form-3', 'horizontal', 'novalidate', 'material');
$form->setMode('development');
$form->setCols(0, 12);
$form->startFieldset('Please fill in this form to contact us');
$form->setCols(0, 6);
$form->groupElements('user-name', 'user-first-name');
$form->addIcon('user-name', '<i class="material-icons" aria-hidden="true">person</i>', 'before');
$form->addInput('text', 'user-name', '', 'Name*', 'required');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="material-icons" aria-hidden="true">email</i>', 'before');
$form->addInput('email', 'user-email', '', 'Email', 'required');
$form->addIcon('user-phone', '<i class="material-icons" aria-hidden="true">call</i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addHelper('If other, please tell us more ... ', 'subject');
$form->addOption('subject', '', 'Your request concerns ...');
$form->addOption('subject', 'Support', 'Support', '', 'data-icon=material-icons info left blue-text');
$form->addOption('subject', 'Sales', 'Sales', '', 'data-icon=material-icons attach_money left amber-text');
$form->addOption('subject', 'Other', 'Other', '', 'data-icon=material-icons question_mark left red-text');
$form->addSelect('subject', '', 'data-slimselect=true');
$form->startDependentFields('subject', 'Other');
$form->addInput('text', 'subject-other', '', 'Please tell more about your request ...', 'required');
$form->endDependentFields();
$form->addTextarea('message', '', 'Your message ...', 'rows=7, required');
$form->addPlugin('tinymce', '#message');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', 1);
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=green');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="material-icons right" aria-hidden="true">email</i>', 'class=btn waves-effect waves-light btn-large, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="amber-text">* Required fields</p>');

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-3');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Contact Form with Rich Text Editor - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Contact Form with Rich Text Editor using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/contact-form-3.php" />

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

    <h1 class="text-center">Php Form Builder - Contact Form<br><small>with Rich Text Editor and Dependent Field</small></h1>

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
            M.AutoInit(document.querySelector('#contact-form-3'));
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
