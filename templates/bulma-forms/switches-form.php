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

$form = new Form('switches-form', 'horizontal', 'novalidate', 'bulma');
$form->setMode('development');


/* Checkboxes
-------------------------------------------------- */

$form->addHeading('Switches with Checkboxes - <small class="text-secondary">Built using lcswitch plugin</small>', 'h2');

$form->startFieldset('Default checkbox switch', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->addCheckbox('vertical-checkbox', 'Label 1', 1, 'class=mb-3');
$form->addCheckbox('vertical-checkbox', 'Label 2', 2, 'class=mb-3, checked');
$form->printCheckboxGroup('vertical-checkbox', 'Vertical checkbox switch', false, 'data-lcswitch=true');
$form->addCheckbox('horizontal-checkbox', 'First', 1, 'checked');
$form->addCheckbox('horizontal-checkbox', 'Second', 2, 'checked');
$form->addCheckbox('horizontal-checkbox', 'Third', 3);
$form->printCheckboxGroup('horizontal-checkbox', 'Horizontal checkboxes', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Dependent field - <small>Switch on the 1<sup>st</sup> switch to show the field below</small>', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->startDependentFields('vertical-checkbox', 1);
$form->addInput('text', 'name', 'value', 'label', 'required');
$form->endDependentFields();
$form->endFieldset();

$form->startFieldset('Colored checkbox switch with CSS colors &amp; gradients', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->setCols(0, 12);
$form->addCheckbox('styled-checkbox', 'black', 1, 'data-oncolor=black, checked');
$form->addCheckbox('styled-checkbox', 'blue', 1, 'data-oncolor=#3964DB, checked');
$form->addCheckbox('styled-checkbox', 'blue-gray', 1, 'data-oncolor=#798EC9, checked');
$form->addCheckbox('styled-checkbox', 'cyan', 1, 'data-oncolor=#00C4DE, checked');
$form->addCheckbox('styled-checkbox', 'gray', 1, 'data-oncolor=#C2C2C2, checked');
$form->addCheckbox('styled-checkbox', 'gray-dark', 1, 'data-oncolor=#4A4A4A, checked');
$form->addCheckbox('styled-checkbox', 'green', 1, 'data-oncolor=#00A14B, checked');
$form->addCheckbox('styled-checkbox', 'indigo', 1, 'data-oncolor=indigo, checked');
$form->addCheckbox('styled-checkbox', 'orange', 1, 'data-oncolor=orange, checked');
$form->addCheckbox('styled-checkbox', 'pink', 1, 'data-oncolor=pink, checked');
$form->addCheckbox('styled-checkbox', 'purple', 1, 'data-oncolor=purple, checked');
$form->addCheckbox('styled-checkbox', 'gradient-1', 1, 'data-oncolor=linear-gradient(140deg\, #fabe1c 35%\, #f88c21), checked');
$form->addCheckbox('styled-checkbox', 'gradient-2', 1, 'data-oncolor=linear-gradient(20deg\, #996a1e 0%\, #efea81), checked');
$form->addCheckbox('styled-checkbox', 'gradient-3', 1, 'data-oncolor=linear-gradient(20deg\, #87e0fd 0%\, #53cbf1 40%, #05abe0), checked');
$form->addCheckbox('styled-checkbox', 'gradient-4', 1, 'data-oncolor=linear-gradient(20deg\, #f0b7a1 0%\, #8c3310), checked');
$form->printCheckboxGroup('styled-checkbox', '', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Custom text checkbox switch + custom color', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->setCols(4, 8);
$form->addCheckbox('horizontal-custom-checkbox', 'Apples?', 1, 'data-ontext=Yes, data-offtext=No, checked');
$form->addCheckbox('horizontal-custom-checkbox', 'Bananas?', 2, 'data-ontext=Yes, data-offtext=No');
$form->printCheckboxGroup('horizontal-custom-checkbox', 'Do you like:', true, 'data-lcswitch=true, data-oncolor=#3964DB');
$form->endFieldset();


/* Radio buttons
-------------------------------------------------- */

$form->addHeading('Switches with Radio buttons - <small class="text-secondary">Built using lcswitch plugin</small>', 'h2');

$form->startFieldset('Default radio switch', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->addRadio('vertical-radio', 'Label 1', 1, 'checked');
$form->addRadio('vertical-radio', 'Label 2', 2);
$form->printRadioGroup('vertical-radio', 'Vertical radio switch', false, 'data-lcswitch=true');
$form->addRadio('horizontal-radio', 'First', 1, 'checked');
$form->addRadio('horizontal-radio', 'Second', 2, 'checked');
$form->addRadio('horizontal-radio', 'Third', 3);
$form->printRadioGroup('horizontal-radio', 'Horizontal radios', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Styled radio switch', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->setCols(0, 12);

$form->addRadio('styled-radio', 'black', 1, 'data-oncolor=black');
$form->addRadio('styled-radio', 'blue', 1, 'data-oncolor=#3964DB');
$form->addRadio('styled-radio', 'blue-gray', 1, 'data-oncolor=#798EC9');
$form->addRadio('styled-radio', 'cyan', 1, 'data-oncolor=#00C4DE');
$form->addRadio('styled-radio', 'gray', 1, 'data-oncolor=#C2C2C2');
$form->addRadio('styled-radio', 'gray-dark', 1, 'data-oncolor=#4A4A4A');
$form->addRadio('styled-radio', 'green', 1, 'data-oncolor=#00A14B');
$form->addRadio('styled-radio', 'indigo', 1, 'data-oncolor=indigo');
$form->addRadio('styled-radio', 'orange', 1, 'data-oncolor=orange');
$form->addRadio('styled-radio', 'pink', 1, 'data-oncolor=pink');
$form->addRadio('styled-radio', 'purple', 1, 'data-oncolor=purple');
$form->addRadio('styled-radio', 'gradient-1', 1, 'data-oncolor=linear-gradient(140deg\, #fabe1c 35%\, #f88c21)');
$form->addRadio('styled-radio', 'gradient-2', 1, 'data-oncolor=linear-gradient(20deg\, #996a1e 0%\, #efea81)');
$form->addRadio('styled-radio', 'gradient-3', 1, 'data-oncolor=linear-gradient(20deg\, #87e0fd 0%\, #53cbf1 40%, #05abe0)');
$form->addRadio('styled-radio', 'gradient-4', 1, 'data-oncolor=linear-gradient(20deg\, #f0b7a1 0%\, #8c3310)');
$form->printRadioGroup('styled-radio', '', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Custom text radio switch + custom color', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->setCols(4, 8);
$form->addRadio('horizontal-custom-radio', 'Apples?', 1, 'data-ontext=Yes, data-offtext=No, checked');
$form->addRadio('horizontal-custom-radio', 'Bananas?', 2, 'data-ontext=Yes, data-offtext=No');
$form->printRadioGroup('horizontal-custom-radio', 'Do you like:', true, 'data-lcswitch=true, data-oncolor=#6B00A1');
$form->endFieldset();

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bulma Form with radio and checkboxes switches - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create switches from radio buttons and checkboxes">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/switches-form.php" />

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
    <style>
        label[for^="styled-checkbox"],
        label[for^="styled-radio"] {
            min-width: 180px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        label[for="vertical-checkbox_0"],
        label[for="vertical-radio_0"] {
            margin-bottom: .75rem;
        }

        .lcs_wrap {
            margin-right: .75rem;
        }

        fieldset {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Bulma Form <br><small>with radio and checkboxes switches</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <div class="has-text-centered mb-6">
                        <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#lcswitch-example" class="button is-dark is-small"><strong>LC-Switch plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                    <?php $form->render(); ?>
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
