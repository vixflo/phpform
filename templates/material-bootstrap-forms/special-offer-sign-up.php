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
        $userMessage = Form::buildAlert('<strong>Thanks for signing up!</strong>', 'bs4', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('special-offer-sign-up', 'vertical', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#special-offer-sign-up');


$form->addHeading('Special Offer Sign Up<br><small>Enter your Name and Email to get Special Deals</small>', 'h3', 'class=mb-5');

$form->startRow();

$form->startCol(12);
$form->addHeading('Full name<sup class="text-danger">* </sup>', 'label', 'class=form-control-label');
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
$form->addHtml('<label>E-mail<sup class="text-danger">* </sup></label></label>');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required');
$form->endCol();

$form->endRow();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>', 'class=btn btn-primary waves-effect waves-light');

// Javascript validation
$form->addPlugin('formvalidation', '#special-offer-sign-up');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Special Offer Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Special Offer Sign Up with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/special-offer-sign-up.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
