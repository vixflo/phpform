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
        $userMessage = Form::buildAlert('<strong>Thanks for signing up!</strong>', 'foundation', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('special-offer-sign-up', 'vertical', 'novalidate', 'foundation');
$form->setMode('development');

$form->addHeading('Special Offer Sign Up<br><small>Enter your Name and Email to get Special Deals</small>', 'h3', 'class=');

$form->startRow();

$form->startCol(12);
$form->addHeading('Full name<sup class="">* </sup>', 'label', 'class=small-12 cell');
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
$form->addHtml('<label>E-mail<sup class="">* </sup></label></label>');
$form->addIcon('user-email', '<i class="input-group-label fi-mail" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required');
$form->endCol();

$form->endRow();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="fi-arrow-right append" aria-hidden="true"></i>', 'class=button primary');

// Javascript validation
$form->addPlugin('formvalidation', '#special-offer-sign-up');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Special Offer Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create a Special Offer Sign Up with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/special-offer-sign-up.php" />

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

    <h1 class="text-center">Php Form Builder - Special Offer Sign Up Form<br><small>vertical form with columns &amp; helpers</small></h1>

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
