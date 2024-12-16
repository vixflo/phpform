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

$form = new Form('contact-form-popover-mp', 'horizontal', 'class=m-4, novalidate', 'bs4');
$form->setMode('development');

$form->startFieldset('Please fill in this form to contact us', '', 'class=text-center mb-4');
$form->addHtml('<p class="text-warning">All fields are required</p>');
$form->groupElements('user-name', 'user-first-name');
$form->setCols(0, 6);
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name, required');
$form->addIcon('user-first-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name, required');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="fas fa-phone" aria-hidden="true"></i>', 'before');
$form->addHelper('Enter a valid US phone number', 'user-phone');
$form->addInput('text', 'user-phone', '', '', 'placeholder=Phone, data-fv-phone, data-fv-phone-country=US, required');
$form->addTextarea('message', '', '', 'placeholder=Your message, rows=7, required');
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));
$form->addCheckbox('newsletter', 'Suscribe to Newsletter', 1);
$form->printCheckboxGroup('newsletter', '');
$form->setCols(3, 9);
$form->addInput('text', 'j-captcha-input', '', 'Type in result please', 'class=jCaptcha');
$form->setCols(0, 12);
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-2" aria-hidden="true"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');
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

$form_2 = new Form('join-us-popover-form-mp', 'horizontal', 'class=m-4, novalidate', 'bs4');
$form_2->setMode('development');

$form_2->setCols(0, 12);

$form_2->startFieldset('Join Us Form', '', 'class=text-center mb-4');

$form_2->addHtml('<h4 class="mb-4">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form_2->addIcon('user-name', '<i class="fas fa-user"></i>', 'before');
$form_2->addInput('text', 'user-name', '', '', 'placeholder=Your Name, required');
$form_2->addIcon('user-email', '<i class="fas fa-envelope"></i>', 'before');
$form_2->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form_2->centerContent();
$form_2->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="fas fa-unlock fa-lg ml-2"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');

$form_2->endFieldset();

$form_2->addHtml('<p class="text-right mb-5"><small><i class="fas fa-lock mr-2"></i>Your Information is Safe With us!</small></p>');

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
    <title>Bootstrap 4 Multiple popover forms - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create several popover forms on same page with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/multiple-popovers.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Font awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
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

        <div class="text-center mb-5">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#popover-example" class="btn btn-secondary btn-sm"><strong>Popover plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <button data-popover-trigger="contact-form-popover-mp" class="btn btn-primary text-white btn-lg">Contact Us</button>
                <button data-popover-trigger="join-us-popover-form-mp" class="btn btn-primary text-white btn-lg">Join Us</button>
                <?php
                $form->render();
                $form_2->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
