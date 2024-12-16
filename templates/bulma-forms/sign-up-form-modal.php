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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('sign-up-modal-form-1') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('sign-up-modal-form-1');

    // additional validation
    $validator->hasLowercase()->hasUppercase()->hasNumber()->hasSymbol()->minLength(8)->validate('user-password');
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['sign-up-modal-form-1'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Sign Up Modal Form',
            'filter_values'   => 'sign-up-modal-form-1, captcha'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('sign-up-modal-form-1');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('sign-up-modal-form-1', 'vertical', 'novalidate', 'bulma');
$form->setMode('development');

$form->addInput('text', 'user-name', '', 'username', 'required');
$form->addInput('email', 'user-email', '', 'e-mail address', 'required');
$form->addPlugin('passfield', '#user-password', 'lower-upper-number-symbol-min-8');
$form->addHelper('password must contain lowercase + uppercase letters + number + symbol and be 8 characters long', 'user-password');
$form->addInput('password', 'user-password', '', 'password', 'required');
$form->centerContent();
$form->addBtn('reset', 'reset-btn', 1, 'Reset', 'class=button is-dark, data-modal-close=modal-target', 'submit-group');
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="fas fa-envelope ml-2" aria-hidden="true"></i>', 'class=button is-primary, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

// modal
$form->modal();

// Javascript validation
$form->addPlugin('formvalidation', '#sign-up-modal-form-1');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bulma Sign Up Modal Form - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create a Sign Up Modal Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/sign-up-form-modal.php" />

    <!-- Bulma CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

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

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Sign Up Modal Form<br><small>click to open Modal</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <div class="has-text-centered mb-6">
                        <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#modal-example" class="button is-dark is-small"><strong>Modal plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                    <?php
                    if (isset($sentMessage)) {
                        echo $sentMessage;
                    }
                    ?>
                    <button data-micromodal-trigger="modal-sign-up-modal-form-1" class="button is-primary is-large">Sign Up</button>
                    <?php
                    $form->render();
                    ?>
                </div>
            </div>
        </div>
    </div>

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
