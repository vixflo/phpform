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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (Form::testToken('contact-form-popover-mp') === true) {
        /* contact-form-popover-mp validation & email */
        // create validator & auto-validate required fields
        $validator = Form::validate('contact-form-popover-mp');

        // additional validation
        $validator->maxLength(100)->validate('message');
        $validator->email()->validate('user-email');
        $validator->jsCaptcha()->validate('j-captcha-input');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['contact-form-popover-mp'] = $validator->getAllErrors();
        } else {
            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => addslashes($_POST['user-email']),
                'subject'         => 'Php Form Builder - Contact Form',
                'filter_values'   => 'contact-form-popover-mp'
            );
            $sentMessage = Form::sendMail($emailConfig);
            Form::clear('contact-form-popover-mp');
        }
    } elseif (Form::testToken('join-us-popover-form-mp') === true) {
        /*join-us-popover-form-mp validation & email */

        // create validator & auto-validate required fields
        $validator = Form::validate('join-us-popover-form-mp');

        // additional validation
        $validator->email()->validate('user-email');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['join-us-popover-form-mp'] = $validator->getAllErrors();
        } else {
            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => addslashes($_POST['user-email']),
                'subject'         => 'Php Form Builder - Join Us Popover Form',
                'filter_values'   => 'join-us-popover-form-mp'
            );
            $sentMessage = Form::sendMail($emailConfig);
            Form::clear('join-us-popover-form-mp');
        }
    }
}

/* ==================================================
    The Contact Form
================================================== */

$form = new Form('contact-form-popover-mp', 'horizontal', 'class=, novalidate', 'material');
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
$form->addHelper('Enter a valid US phone number', 'user-phone');
$form->addInput('text', 'user-phone', '', 'Phone', 'data-fv-phone, data-fv-phone-country=US, required');
$form->addTextarea('message', '', 'Your message', 'rows=7, required');
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));
$form->addCheckbox('newsletter', 'Suscribe to Newsletter', 1);
$form->printCheckboxGroup('newsletter', '');
$form->setCols(3, 9);
$form->addInput('text', 'j-captcha-input', '', 'Type in result please', 'class=jCaptcha');
$form->setCols(0, 12);
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="material-icons right" aria-hidden="true">email</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Custom radio & checkbox css
$form->addPlugin('pretty-checkbox', '#contact-form-popover-mp');

// popover plugin
$form->popover();

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-popover-mp');

/* ==================================================
    The Join Us Form
================================================== */

$form_2 = new Form('join-us-popover-form-mp', 'horizontal', 'class=, novalidate', 'material');
$form_2->setMode('development');

$form_2->setCols(0, 12);

$form_2->startFieldset('Join Us Form');

$form_2->addHtml('<h4 class="">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form_2->addIcon('user-name', '<i class="material-icons">person</i>', 'before');
$form_2->addInput('text', 'user-name', '', 'Your Name', 'required');
$form_2->addIcon('user-email', '<i class="material-icons">email</i>', 'before');
$form_2->addInput('email', 'user-email', '', 'Email', 'required');
$form_2->centerContent();
$form_2->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="material-icons right">lock_open</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');

$form_2->endFieldset();

$form_2->addHtml('<p class="text-right "><small><i class="material-icons left">lock</i>Your Information is Safe With us!</small></p>');

// popover plugin
$form_2->popover();

// Javascript validation
$form_2->addPlugin('formvalidation', '#join-us-popover-form-mp');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Multiple popover forms - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create several popover forms on same page with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/multiple-popovers.php" />

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
    <?php
    $form->printIncludes('css');
    $form_2->printIncludes('css');
    ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - several Popover Forms on same page<br><small>click to sign up or contact</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="center-align">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#popover-example" class="btn grey darken-1 waves-effect waves-light btn-small"><strong>Popover plugin</strong> - documentation here <i class="material-icons right">arrow_right</i></a>
            <p>&nbsp;</p>
        </div>

        <div class="row">

            <div class="col m11 l10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <button data-popover-trigger="contact-form-popover-mp" class="btn waves-effect waves-light text-white btn-large">Contact Us</button>
                <button data-popover-trigger="join-us-popover-form-mp" class="btn waves-effect waves-light text-white btn-large">Join Us</button>
                <?php
                $form->render();
                $form_2->render();
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
            M.AutoInit(document.querySelector('#contact-form-popover-mp'));
        });
    </script>

    <?php
    $form->printIncludes('js');
    $form_2->printIncludes('js');
    $form->printJsCode();
    $form_2->printJsCode();
    ?>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
