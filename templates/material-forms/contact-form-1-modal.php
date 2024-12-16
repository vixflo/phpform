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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-1-modal') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-1-modal');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-1-modal'] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-1-modal'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-1-modal');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-1-modal', 'horizontal', 'novalidate', 'material');
$form->setMode('development');
$form->startFieldset('Please fill in this form to contact us');
$form->addHtml('<p class="amber-text">All fields are required</p>');
$form->groupElements('user-name', 'user-first-name');
$form->setCols(0, 6);
$form->addIcon('user-name', '<i class="material-icons" aria-hidden="true">person</i>', 'before');
$form->addInput('text', 'user-name', '', 'Name', 'required');
$form->addIcon('user-first-name', '<i class="material-icons" aria-hidden="true">person</i>', 'before');
$form->addInput('text', 'user-first-name', '', 'First Name', 'required');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="material-icons" aria-hidden="true">email</i>', 'before');
$form->addInput('email', 'user-email', '', 'Email', 'required');
$form->addIcon('user-phone', '<i class="material-icons" aria-hidden="true">call</i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addTextarea('message', '', '', 'rows=7, placeholder=Message, required');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', '1');
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=green');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=center-align');
$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="material-icons right" aria-hidden="true">close</i>', 'class=btn orange darken-1 waves-effect waves-light', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="material-icons right" aria-hidden="true">email</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// word-character-count plugin
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));

// modal
$form->modal();

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-1-modal');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Modal Contact Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Modal Contact Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/contact-form-1-modal.php" />

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

    <h1 class="text-center">Php Form Builder - Material Modal Contact Form</h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <div class="center-align">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#modal-example" class="btn grey darken-1 waves-effect waves-light btn-small"><strong>Modal forms</strong> - documentation here <i class="material-icons right">arrow_right</i></a>
                    <p>&nbsp;</p>
                </div>

                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <button data-micromodal-trigger="modal-contact-form-1-modal" class="btn waves-effect waves-light btn-large">Contact Us</button>
                <?php
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
            M.AutoInit(document.querySelector('#contact-form-1-modal'));
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
