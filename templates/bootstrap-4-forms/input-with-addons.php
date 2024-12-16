<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* ==================================================
    The Form
================================================== */

$form = new Form('input-with-addons', 'horizontal', 'novalidate', 'bs4');
$form->setMode('development');


/* Input with icon
-------------------------------------------------- */

$form->startFieldset('Input with icon', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$form->setCols(3, 9);

$form->addIcon('input-with-icon-after', '<i class="fas fa-user"></i>', 'after');
$form->addInput('text', 'input-with-icon-after', '', 'Your name', 'required');

$form->addIcon('input-with-icon-before', '<i class="fas fa-user"></i>', 'before');
$form->addInput('text', 'input-with-icon-before', '', 'Your name', 'required');

$form->setCols(0, 12);

$form->addIcon('input-with-icon-and-helper', '<i class="fas fa-user"></i>', 'after');
$form->addHelper('Your name', 'input-with-icon-and-helper');
$form->addInput('text', 'input-with-icon-and-helper', '', '', 'required');

$form->addIcon('input-with-icon-and-placeholder', '<i class="fas fa-user"></i>', 'after');
$form->addInput('text', 'input-with-icon-and-placeholder', '', '', 'placeholder=Your name, required');

$form->endFieldset();

/* Input with Button
-------------------------------------------------- */

$form->startFieldset('Input with button', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$form->setCols(3, 9);

$addon = '<button class="btn btn-secondary" type="button" onclick="document.getElementById(\'input-with-button-after\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-after', $addon, 'after');
$form->addInput('text', 'input-with-button-after', '', 'Your name', 'required');

$addon = '<button class="btn btn-secondary" type="button" onclick="document.getElementById(\'input-with-button-before\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-before', $addon, 'before');
$form->addInput('text', 'input-with-button-before', '', 'Your name', 'required');

$form->setCols(0, 12);

$addon = '<button class="btn btn-secondary" type="button" onclick="document.getElementById(\'input-with-button-and-helper\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-helper', $addon, 'after');
$form->addHelper('Your name', 'input-with-button-and-helper');
$form->addInput('text', 'input-with-button-and-helper', '', '', 'required');

$addon = '<button class="btn btn-secondary" type="button" onclick="document.getElementById(\'input-with-button-and-placeholder\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-placeholder', $addon, 'after');
$form->addInput('text', 'input-with-button-and-placeholder', '', '', 'placeholder=Your name, required');

$form->endFieldset();


/* Input with Text
-------------------------------------------------- */

$form->startFieldset('Input with text', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$form->setCols(3, 9);

$addon = '$';
$form->addAddon('input-with-text-after', $addon, 'after');
$form->addInput('number', 'input-with-text-after', '', 'Number', 'required');

$addon = '$';
$form->addAddon('input-with-text-before', $addon, 'before');
$form->addInput('number', 'input-with-text-before', '', 'Number', 'required');

$form->setCols(0, 12);

$addon = '$';
$form->addAddon('input-with-text-and-helper', $addon, 'after');
$form->addHelper('Number', 'input-with-text-and-helper');
$form->addInput('number', 'input-with-text-and-helper', '', '', 'required');

$addon = '$';
$form->addAddon('input-with-text-and-placeholder', $addon, 'after');
$form->addInput('number', 'input-with-text-and-placeholder', '', '', 'placeholder=Number, required');

$form->endFieldset();

/* Input with Button & icon
-------------------------------------------------- */

$form->startFieldset('Input with button & icon', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$form->setCols(3, 9);

$form->addIcon('input-with-button-and-icon-after', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="btn btn-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-after\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-after', $addon, 'after');
$form->addInput('text', 'input-with-button-and-icon-after', '', 'Your name', 'required');

$addon = '<button class="btn btn-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-before\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-before', $addon, 'before');
$form->addIcon('input-with-button-and-icon-before', '<i class="fas fa-user"></i>', 'after');
$form->addInput('text', 'input-with-button-and-icon-before', '', 'Your name', 'required');

$form->setCols(0, 12);

$form->addIcon('input-with-button-and-icon-and-helper', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="btn btn-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-and-helper\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-and-helper', $addon, 'after');
$form->addHelper('Your name', 'input-with-button-and-icon-and-helper');
$form->addInput('text', 'input-with-button-and-icon-and-helper', '', '', 'required');

$form->addIcon('input-with-button-and-icon-and-placeholder', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="btn btn-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-and-placeholder\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-and-placeholder', $addon, 'after');
$form->addInput('text', 'input-with-button-and-icon-and-placeholder', '', '', 'placeholder=Your name, required');

$form->endFieldset();

/* Input with date picker &amp; reset button
-------------------------------------------------- */

$form->startFieldset('Input with date picker &amp; reset button', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$form->setCols(3, 9);

$addon = '<button class="btn btn-danger" type="button" onclick="document.getElementById(\'date-pickup\').value=\'\';">reset</button>';
$form->addAddon('date-pickup', $addon, 'after');
$form->addInput('text', 'date-pickup', '', 'Pick a date please', 'data-litepick=true, required');

$form->endFieldset();

/* Select with Button
-------------------------------------------------- */

$form->startFieldset('Select with button', 'class=border-bottom mb-4 pb-4', 'class=text-muted pb-4');

$addon = '<button class="btn btn-warning" type="button" onclick="$(\'#select-with-button-after\').val(null).selectpicker(\'refresh\');">reset</button>';
$form->addAddon('select-with-button-after', $addon, 'after');
$form->addOption('select-with-button-after', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-after', 'Mr', 'Mr');
$form->addOption('select-with-button-after', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-after', 'Prefix', 'class=selectpicker, required');

$addon = '<button class="btn btn-warning" type="button" onclick="$(\'#select-with-button-before\').val(null).selectpicker(\'refresh\');">reset</button>';
$form->addAddon('select-with-button-before', $addon, 'before');
$form->addOption('select-with-button-before', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-before', 'Mr', 'Mr');
$form->addOption('select-with-button-before', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-before', 'Prefix', 'class=selectpicker, required');

$form->endFieldset();

/* Select with Button + icon
-------------------------------------------------- */

$form->startFieldset('Select with button &amp; icon', 'class=mb-5 pb-5', 'class=text-muted pb-4');

$form->addIcon('select-with-button-and-icon-after', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="btn btn-warning" type="button" onclick="$(\'#select-with-button-and-icon-after\').val(null).selectpicker(\'refresh\');">reset</button>';
$form->addAddon('select-with-button-and-icon-after', $addon, 'after');
$form->addOption('select-with-button-and-icon-after', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-and-icon-after', 'Mr', 'Mr');
$form->addOption('select-with-button-and-icon-after', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-and-icon-after', 'Prefix', 'class=selectpicker, required');

$addon = '<button class="btn btn-warning" type="button" onclick="$(\'#select-with-button-and-icon-before\').val(null).selectpicker(\'refresh\');">reset</button>';
$form->addAddon('select-with-button-and-icon-before', $addon, 'before');
$form->addIcon('select-with-button-and-icon-before', '<i class="fas fa-user"></i>', 'after');
$form->addOption('select-with-button-and-icon-before', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-and-icon-before', 'Mr', 'Mr');
$form->addOption('select-with-button-and-icon-before', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-and-icon-before', 'Prefix', 'class=selectpicker, required');

$form->centerContent();

$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary mt-5');

$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#input-with-addons');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Form - Input with Addons examples</title>
    <meta name="description" content="Bootstrap 4 Form - how to create Input with Addons with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/input-with-addons.php" />

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
    <h1 class="text-center">Bootstrap 4 Form - <small>Input and select with icon, button and text Addons</small></h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#add-addon" class="btn btn-secondary btn-sm"><strong>Icons &amp; addons</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
                <?php
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
