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
        $userMessage = Form::buildAlert('<strong>Thanks for signing up!</strong>', 'bulma', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('special-offer-sign-up', 'vertical', 'novalidate', 'bulma');
$form->setMode('development');

$form->addHeading('Special Offer Sign Up<br><small>Enter your Name and Email to get Special Deals</small>', 'h3', 'class=mb-6');

$form->startRow();

$form->startCol(12);
$form->addHeading('Full name<sup class="has-text-danger-dark">* </sup>', 'label', 'class=label');
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
$form->addHtml('<label>E-mail<sup class="has-text-danger-dark">* </sup></label></label>');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required');
$form->endCol();

$form->endRow();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>', 'class=button is-primary');

// Javascript validation
$form->addPlugin('formvalidation', '#special-offer-sign-up');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bulma Special Offer Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create a Special Offer Sign Up with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/special-offer-sign-up.php" />

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

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Special Offer Sign Up Form<br><small>vertical form with columns &amp; helpers</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <?php
                    if (isset($userMessage)) {
                        echo $userMessage;
                    }
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
