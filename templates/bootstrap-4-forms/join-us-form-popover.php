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

$form = new Form('join-us-popover-form', 'horizontal', 'class=m-4, novalidate', 'bs4');
$form->setMode('development');

$form->setCols(0, 12);

$form->startFieldset();

$form->addHtml('<h4>Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="fas fa-user"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'required, placeholder=Your Name');
$form->addIcon('user-email', '<i class="fas fa-envelope"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required, placeholder=Email');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="fas fa-unlock ml-2"></i>', 'class=btn btn-primary btn-lg, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

$form->addHtml('<p class="text-right mb-0"><small><i class="fas fa-lock mr-2"></i>Your Information is Safe With us!</small></p>');

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
    <title>Bootstrap 4 Join Us Popover Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create a Join Us Popover Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/join-us-form-popover.php" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Php Form Builder - Join Us Popover Form<br><small>click to open Popover</small></h1>
    <div class="container">

        <div class="text-center mb-5">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#popover-example" class="btn btn-secondary btn-sm"><strong>Popover plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
        </div>

        <div class="row">
            <?php
            if (isset($sentMessage)) {
                echo $sentMessage;
            }
            ?>
            <!-- Button trigger popover -->
            <button type="button" data-popover-trigger="join-us-popover-form" class="btn btn-primary text-white btn-lg">Join Us</button>
            <?php
            $form->render();
            ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
