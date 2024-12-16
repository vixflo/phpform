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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('special-offer-sign-up') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('special-offer-sign-up');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['special-offer-sign-up'] = $validator->getAllErrors();
    } else {
        Form::clear('special-offer-sign-up'); // just for demo ; delete this line if real database recording.
        $userMessage = Form::buildAlert('<strong>Thanks for signing up!</strong>', 'tailwind', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('special-offer-sign-up', 'vertical', 'novalidate', 'tailwind');
$form->setMode('development');

$form->addHeading('Special Offer Sign Up<br><small>Enter your Name and Email to get Special Deals</small>', 'h3', 'class=mb-10');

$form->startRow();

$form->startCol(12);
$form->addHeading('Full name<sup class="text-red-500">* </sup>', 'label', 'class=block');
$form->endCol();

$form->endRow();
$form->startRow();

$form->startCol(6);
$form->addHelper('First Name', 'user-first-name');
$form->addInput('text', 'user-first-name', '', '', 'required');
$form->endCol();

$form->startCol(6);
$form->addHelper('Last Name', 'user-name');
$form->addInput('text', 'user-name', '', '', 'required');
$form->endCol();

$form->endRow();
$form->startRow();

$form->startCol(12);
$form->addHtml('<label>E-mail<sup class="text-red-500">* </sup></label></label>');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required');
$form->endCol();

$form->endRow();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="fas fa-arrow-right ml-4" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800');

// Javascript validation
$form->addPlugin('formvalidation', '#special-offer-sign-up');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Special Offer Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Special Offer Sign Up with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/special-offer-sign-up.php" />

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

    <h1 class="text-center">Php Form Builder - Special Offer Sign Up Form<br><small>vertical form with columns &amp; helpers</small></h1>

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
