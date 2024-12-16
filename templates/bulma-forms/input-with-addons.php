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

$form = new Form('input-with-addons', 'horizontal', 'novalidate', 'bulma');
$form->setMode('development');


/* Input with icon
-------------------------------------------------- */

$form->startFieldset('Input with icon', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

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

$form->startFieldset('Input with button', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

$form->setCols(3, 9);

$addon = '<button class="button is-dark" type="button" onclick="document.getElementById(\'input-with-button-after\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-after', $addon, 'after');
$form->addInput('text', 'input-with-button-after', '', 'Your name', 'required');

$addon = '<button class="button is-dark" type="button" onclick="document.getElementById(\'input-with-button-before\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-before', $addon, 'before');
$form->addInput('text', 'input-with-button-before', '', 'Your name', 'required');

$form->setCols(0, 12);

$addon = '<button class="button is-dark" type="button" onclick="document.getElementById(\'input-with-button-and-helper\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-helper', $addon, 'after');
$form->addHelper('Your name', 'input-with-button-and-helper');
$form->addInput('text', 'input-with-button-and-helper', '', '', 'required');

$addon = '<button class="button is-dark" type="button" onclick="document.getElementById(\'input-with-button-and-placeholder\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-placeholder', $addon, 'after');
$form->addInput('text', 'input-with-button-and-placeholder', '', '', 'placeholder=Your name, required');

$form->endFieldset();


/* Input with Text
-------------------------------------------------- */

$form->startFieldset('Input with text', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

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

$form->startFieldset('Input with button & icon', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

$form->setCols(3, 9);

$form->addIcon('input-with-button-and-icon-after', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="button is-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-after\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-after', $addon, 'after');
$form->addInput('text', 'input-with-button-and-icon-after', '', 'Your name', 'required');

$addon = '<button class="button is-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-before\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-before', $addon, 'before');
$form->addIcon('input-with-button-and-icon-before', '<i class="fas fa-user"></i>', 'after');
$form->addInput('text', 'input-with-button-and-icon-before', '', 'Your name', 'required');

$form->setCols(0, 12);

$form->addIcon('input-with-button-and-icon-and-helper', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="button is-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-and-helper\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-and-helper', $addon, 'after');
$form->addHelper('Your name', 'input-with-button-and-icon-and-helper');
$form->addInput('text', 'input-with-button-and-icon-and-helper', '', '', 'required');

$form->addIcon('input-with-button-and-icon-and-placeholder', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="button is-danger" type="button" onclick="document.getElementById(\'input-with-button-and-icon-and-placeholder\').value=\'\';">reset</button>';
$form->addAddon('input-with-button-and-icon-and-placeholder', $addon, 'after');
$form->addInput('text', 'input-with-button-and-icon-and-placeholder', '', '', 'placeholder=Your name, required');

$form->endFieldset();

/* Input with date picker &amp; reset button
-------------------------------------------------- */

$form->startFieldset('Input with date picker &amp; reset button', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

$form->setCols(3, 9);

$addon = '<button class="button is-danger" type="button" onclick="document.getElementById(\'date-pickup\').value=\'\';">reset</button>';
$form->addAddon('date-pickup', $addon, 'after');
$form->addInput('text', 'date-pickup', '', 'Pick a date please', 'data-litepick=true, required');

$form->endFieldset();

/* Select with Button
-------------------------------------------------- */

$form->startFieldset('Select with button', 'class=border-bottom mb-4 pb-4', 'class=has-text-grey-light pb-4');

$addon = '<button class="button is-warning" type="button" onclick="window.slimSelects[\'select-with-button-after\'].set(null);">reset</button>';
$form->addAddon('select-with-button-after', $addon, 'after');
$form->addOption('select-with-button-after', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-after', 'Mr', 'Mr');
$form->addOption('select-with-button-after', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-after', 'Prefix', 'data-slimselect=true, required');

$addon = '<button class="button is-warning" type="button" onclick="window.slimSelects[\'select-with-button-before\'].set(null);">reset</button>';
$form->addAddon('select-with-button-before', $addon, 'before');
$form->addOption('select-with-button-before', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-before', 'Mr', 'Mr');
$form->addOption('select-with-button-before', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-before', 'Prefix', 'data-slimselect=true, required');

$form->endFieldset();

/* Select with Button + icon
-------------------------------------------------- */

$form->startFieldset('Select with button &amp; icon', 'class=mb-6 pb-5', 'class=has-text-grey-light pb-4');

$form->addIcon('select-with-button-and-icon-after', '<i class="fas fa-user"></i>', 'before');
$addon = '<button class="button is-warning" type="button" onclick="window.slimSelects[\'select-with-button-and-icon-after\'].set(null);">reset</button>';
$form->addAddon('select-with-button-and-icon-after', $addon, 'after');
$form->addOption('select-with-button-and-icon-after', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-and-icon-after', 'Mr', 'Mr');
$form->addOption('select-with-button-and-icon-after', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-and-icon-after', 'Prefix', 'data-slimselect=true, required');

$addon = '<button class="button is-warning" type="button" onclick="window.slimSelects[\'select-with-button-and-icon-before\'].set(null);">reset</button>';
$form->addIcon('select-with-button-and-icon-before', '<i class="fas fa-user"></i>', 'after');
$form->addAddon('select-with-button-and-icon-before', $addon, 'before');
$form->addOption('select-with-button-and-icon-before', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('select-with-button-and-icon-before', 'Mr', 'Mr');
$form->addOption('select-with-button-and-icon-before', 'Mrs', 'Mrs');
$form->addSelect('select-with-button-and-icon-before', 'Prefix', 'data-slimselect=true, required');

$form->centerContent();

$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=button is-primary mt-5');

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
    <title>Bulma Form - Input with Addons examples</title>
    <meta name="description" content="Bulma Form - how to create Input with Addons with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/input-with-addons.php" />

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

    <h1 class="has-text-centered is-size-1 mb-6">Bulma Form - <small>Input and select with icon, button and text Addons</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <div class="has-text-centered mb-6">
                        <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#add-addon" class="button is-dark is-small"><strong>Icons &amp; addons</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                    <?php
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
