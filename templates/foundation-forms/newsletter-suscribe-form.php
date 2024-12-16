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
            $msg = Form::buildAlert('An error has occured', 'foundation', 'danger');
        } else {
            $userMessage = Form::buildAlert('Thanks for suscribe !', 'foundation', 'success');
            Form::clear('newsletter-suscribe-form');
        } */

        // just for demo ; delete the 2 following lines if real database recording.
        Form::clear('newsletter-suscribe-form');
        $userMessage = Form::buildAlert('Thanks for suscribe !', 'foundation', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('newsletter-suscribe-form', 'vertical', 'novalidate', 'foundation');
$form->setMode('development');

$form->startFieldset('Newsletter Suscribe Form', '', 'class=h4 text-center');
$form->addHtml('<p class="text-success text-center "><em>Subscribe to our Newsletter and receive exclusive offers, updates and news</em></p>');
$form->addIcon('user-name', '<i class="input-group-label fi-torso" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Your Name, required');
$form->addIcon('user-email', '<i class="input-group-label fi-mail" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Your E-mail, required');
$form->addBtn('submit', 'submit-btn', 1, 'Suscribe <i class="fi-arrow-right append"></i>', 'class=button primary expanded');
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
    <title>Foundation Newsletter Suscribe Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create a Newsletter Suscribe Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/newsletter-suscribe-form.php" />

    <!-- Foundation CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">

    <!-- foundation icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css">
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

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
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

    <!-- Foundation JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js" crossorigin="anonymous"></script>

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
