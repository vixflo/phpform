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
        $userMessage = Form::buildAlert('<strong>Thanks for signing up!</strong>', 'bs5', 'success');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('special-offer-sign-up', 'vertical', 'novalidate', 'bs5');
$form->setMode('development');

$form->addHeading('Special Offer Sign Up<br><small>Enter your Name and Email to get Special Deals</small>', 'h3', 'class=mb-5');

$form->startRow();

$form->startCol(12);
$form->addHeading('Full name<sup class="text-danger">* </sup>', 'label', 'class=form-label');
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
$form->addIcon('user-email', '<i class="bi bi-envelope-fill" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required');
$form->endCol();

$form->endRow();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="bi bi-arrow-right ms-2" aria-hidden="true"></i>', 'class=btn btn-primary');

// Javascript validation
$form->addPlugin('formvalidation', '#special-offer-sign-up');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Special Offer Sign Up Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Special Offer Sign Up with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/special-offer-sign-up.php" />

    <!-- Bootstrap 5 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    <!-- Bootstrap 5 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
