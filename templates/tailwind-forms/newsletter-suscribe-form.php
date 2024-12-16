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
            $msg = Form::buildAlert('An error has occured', 'tailwind', 'danger');
        } else {
            $userMessage = Form::buildAlert('Thanks for suscribe !', 'tailwind', 'success');
            Form::clear('newsletter-suscribe-form');
        } */

        // just for demo ; delete the 2 following lines if real database recording.
        Form::clear('newsletter-suscribe-form');
        $userMessage = Form::buildAlert('Thanks for suscribe !', 'tailwind', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('newsletter-suscribe-form', 'vertical', 'novalidate', 'tailwind');
$form->setMode('development');

$form->startFieldset('Newsletter Suscribe Form', '', 'class=text-2xl dark:text-white my-6');
$form->addHtml('<p class="text-success text-center mt-8"><em>Subscribe to our Newsletter and receive exclusive offers, updates and news</em></p>');
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Your Name, required');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Your E-mail, required');
$form->addBtn('submit', 'submit-btn', 1, 'Suscribe <i class="fas fa-arrow-right ml-4"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full');
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
    <title>Tailwind Newsletter Suscribe Form - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Newsletter Suscribe Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/newsletter-suscribe-form.php" />

    <!-- Tailwind CSS - for demo purposes only - replace with your Tailwind compilation -->

    <script src="https://cdn.tailwindcss.com"></script>

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

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <?php
            if (isset($userMessage)) {
                echo $userMessage;
            }
            $form->render();
            ?>
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
