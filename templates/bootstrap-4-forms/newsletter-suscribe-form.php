<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;
use Migliori\PowerLitePdo\Db;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('newsletter-suscribe-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('newsletter-suscribe-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['newsletter-suscribe-form'] = $validator->getAllErrors();
    } else {
        /* =============================================
            Database connection insert (disabled for demo)
        ============================================= */

        // Setup your connection in phpformbuilder/vendor/migliori/power-lite-pdo/src/connection.php

        $root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

        $container = require_once $root . '/phpformbuilder/vendor/migliori/power-lite-pdo/src/bootstrap.php';
        $db = $container->get(Db::class);

        $values = array('id' => '', 'user_name' => $_POST['user-name'], 'user_email' => $_POST['user-email']);

        /* if (!$db->insert('YOUR_TABLE', $values)) {
            $msg = Form::buildAlert('An error has occured', 'bs4', 'danger');
        } else {
            $userMessage = Form::buildAlert('Thanks for suscribe !', 'bs4', 'success');
            Form::clear('newsletter-suscribe-form');
        } */

        // just for demo ; delete the 2 following lines if real database recording.
        Form::clear('newsletter-suscribe-form');
        $userMessage = Form::buildAlert('Thanks for suscribe !', 'bs4', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('newsletter-suscribe-form', 'vertical', 'novalidate', 'bs4');
$form->setMode('development');

$form->startFieldset('Newsletter Suscribe Form', '', 'class=text-center mb-4');
$form->addHtml('<p class="text-success text-center mt-5"><em>Subscribe to our Newsletter and receive exclusive offers, updates and news</em></p>');
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Your Name, required');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Your E-mail, required');
$form->addBtn('submit', 'submit-btn', 1, 'Suscribe <i class="fas fa-arrow-right ml-2"></i>', 'class=btn btn-primary btn-block');
$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#newsletter-suscribe-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Newsletter Suscribe Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create a Newsletter Suscribe Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/newsletter-suscribe-form.php" />

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
    <?php $form->printIncludes('css'); ?>
</head>

<body>
    <h1 class="text-center">Php Form Builder - Newsletter Form<br><small>Suscribe to our Newsletter</small></h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <?php
                if (isset($userMessage)) {
                    echo $userMessage;
                }
                $form->render();
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
