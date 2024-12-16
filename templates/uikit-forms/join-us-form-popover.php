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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('join-us-popover-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('join-us-popover-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['join-us-popover-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Join Us Popover Form',
            'filter_values'   => 'join-us-popover-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('join-us-popover-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('join-us-popover-form', 'horizontal', 'class=uk-margin-medium, novalidate', 'uikit');
$form->setMode('development');

$form->setCols(0, 12);

$form->startFieldset();

$form->addHtml('<h4>Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="uk-form-icon fas fa-user"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'required, placeholder=Your Name');
$form->addIcon('user-email', '<i class="uk-form-icon fas fa-envelope"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required, placeholder=Email');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="fas fa-unlock uk-margin-left"></i>', 'class=uk-button uk-button-primary uk-button-large, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

$form->addHtml('<p class="uk-align-right uk-margin-remove-bottom"><small><i class="fas fa-lock uk-margin-right"></i>Your Information is Safe With us!</small></p>');

// popover plugin
$form->popover();

// Javascript validation
$form->addPlugin('formvalidation', '#join-us-popover-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Join Us Popover Form - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create a Join Us Popover Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/join-us-form-popover.php" />

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

    <h1 class="uk-text-center">Php Form Builder - Join Us Popover Form<br><small>click to open Popover</small></h1>

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
        <button type="button" data-popover-trigger="join-us-popover-form" class="uk-button uk-button-primary text-white uk-button-large">Join Us</button>
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
