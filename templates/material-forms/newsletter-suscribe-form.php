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
            $msg = Form::buildAlert('An error has occured', 'material', 'danger');
        } else {
            $userMessage = Form::buildAlert('Thanks for suscribe !', 'material', 'success');
            Form::clear('newsletter-suscribe-form');
        } */

        // just for demo ; delete the 2 following lines if real database recording.
        Form::clear('newsletter-suscribe-form');
        $userMessage = Form::buildAlert('Thanks for suscribe !', 'material', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('newsletter-suscribe-form', 'vertical', 'novalidate', 'material');
$form->setMode('development');

$form->startFieldset('Newsletter Suscribe Form');
$form->addHtml('<p class="text-success center-align "><em>Subscribe to our Newsletter and receive exclusive offers, updates and news</em></p>');
$form->addIcon('user-name', '<i class="material-icons" aria-hidden="true">person</i>', 'before');
$form->addInput('text', 'user-name', '', 'Your Name', 'required');
$form->addIcon('user-email', '<i class="material-icons" aria-hidden="true">email</i>', 'before');
$form->addInput('email', 'user-email', '', 'Your E-mail', 'required');
$form->addBtn('submit', 'submit-btn', 1, 'Suscribe <i class="material-icons right">arrow_right</i>', 'class=btn waves-effect waves-light ');
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
    <title>Material Newsletter Suscribe Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Newsletter Suscribe Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/newsletter-suscribe-form.php" />

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

    <h1 class="text-center">Php Form Builder - Newsletter Form<br><small>Suscribe to our Newsletter</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
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

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#newsletter-suscribe-form'));
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
