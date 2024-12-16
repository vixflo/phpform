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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('sign-up-popover-form-1') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('sign-up-popover-form-1');

    // additional validation
    $validator->hasLowercase()->hasUppercase()->hasNumber()->hasSymbol()->minLength(8)->validate('user-password');
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['sign-up-popover-form-1'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Sign Up Popover Form',
            'filter_values'   => 'sign-up-popover-form-1, captcha'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('sign-up-popover-form-1');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('sign-up-popover-form-1', 'vertical', 'class=uk-margin-medium, novalidate', 'uikit');
$form->setMode('development');

$form->addInput('text', 'user-name', '', 'username', 'required');
$form->addInput('email', 'user-email', '', 'e-mail address', 'required');
$form->addPlugin('passfield', '#user-password', 'lower-upper-number-symbol-min-8');
$form->addHelper('password must contain lowercase + uppercase letters + number + symbol and be 8 characters long', 'user-password');
$form->addInput('password', 'user-password', '', 'password', 'required');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="uk-icon fas fa-envelope uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in');

// popover plugin
$form->popover();

// Javascript validation
$form->addPlugin('formvalidation', '#sign-up-popover-form-1');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Sign Up Popover Form - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create a Sign Up Popover Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/sign-up-form-popover.php" />

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

    <h1 class="uk-text-center">Php Form Builder - Sign Up Popover Form<br><small>click to open Popover</small></h1>

    <div class="uk-container" style="min-width:70vw;">

        <div class="uk-text-center uk-margin-large-bottom">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#popover-example" class="uk-button uk-button-default uk-button-small"><strong>Popover plugin</strong> - documentation here <i class="fas fa-arrow-right uk-margin-left"></i></a>
        </div>

        <?php
        if (isset($sentMessage)) {
            echo $sentMessage;
        }
        ?>
        <!-- Button trigger popover -->
        <button type="button" data-popover-trigger="sign-up-popover-form-1" class="uk-button uk-button-primary text-white uk-button-large">Sign Up</button>
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
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
