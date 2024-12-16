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

$form = new Form('switches-form', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');


/* Checkboxes
-------------------------------------------------- */

$form->addHeading('Switches with Checkboxes - <small class="text-secondary">Built using lcswitch plugin</small>', 'h2');

$form->startFieldset('Default checkbox switch', '', 'class=text-center mb-4');
$form->addCheckbox('vertical-checkbox', 'Label 1', 1, 'class=mb-3');
$form->addCheckbox('vertical-checkbox', 'Label 2', 2, 'class=mb-3, checked');
$form->printCheckboxGroup('vertical-checkbox', 'Vertical checkbox switch', false, 'data-lcswitch=true');
$form->addCheckbox('horizontal-checkbox', 'First', 1, 'checked');
$form->addCheckbox('horizontal-checkbox', 'Second', 2, 'checked');
$form->addCheckbox('horizontal-checkbox', 'Third', 3);
$form->printCheckboxGroup('horizontal-checkbox', 'Horizontal checkboxes', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Dependent field - <small>Switch on the 1<sup>st</sup> switch to show the field below</small>', '', 'class=text-center mb-4');
$form->startDependentFields('vertical-checkbox', 1);
$form->addInput('text', 'name', 'value', 'label', 'required');
$form->endDependentFields();
$form->endFieldset();

$form->startFieldset('Colored checkbox switch with CSS colors &amp; gradients', '', 'class=text-center mb-4');
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

$form->startFieldset('Custom text checkbox switch + custom color', '', 'class=text-center mb-4');
$form->setCols(4, 8);
$form->addCheckbox('horizontal-custom-checkbox', 'Apples?', 1, 'data-ontext=Yes, data-offtext=No, checked');
$form->addCheckbox('horizontal-custom-checkbox', 'Bananas?', 2, 'data-ontext=Yes, data-offtext=No');
$form->printCheckboxGroup('horizontal-custom-checkbox', 'Do you like:', true, 'data-lcswitch=true, data-oncolor=#3964DB');
$form->endFieldset();


/* Radio buttons
-------------------------------------------------- */

$form->addHeading('Switches with Radio buttons - <small class="text-secondary">Built using lcswitch plugin</small>', 'h2');

$form->startFieldset('Default radio switch', '', 'class=text-center mb-4');
$form->addRadio('vertical-radio', 'Label 1', 1, 'checked');
$form->addRadio('vertical-radio', 'Label 2', 2);
$form->printRadioGroup('vertical-radio', 'Vertical radio switch', false, 'data-lcswitch=true');
$form->addRadio('horizontal-radio', 'First', 1, 'checked');
$form->addRadio('horizontal-radio', 'Second', 2, 'checked');
$form->addRadio('horizontal-radio', 'Third', 3);
$form->printRadioGroup('horizontal-radio', 'Horizontal radios', true, 'data-lcswitch=true');
$form->endFieldset();

$form->startFieldset('Styled radio switch', '', 'class=text-center mb-4');
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

$form->startFieldset('Custom text radio switch + custom color', '', 'class=text-center mb-4');
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
    <title>Bootstrap 5 Form with radio and checkboxes switches - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create switches from radio buttons and checkboxes">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/switches-form.php" />

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
    <style>
        label[for^="styled-checkbox"],
        label[for^="styled-radio"] {
            min-width: 180px;
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .form-check-inline {
            margin-bottom: 1rem;
        }

        fieldset {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Bootstrap 5 Form <br><small>with radio and checkboxes switches</small></h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#lcswitch-example" class="btn btn-secondary btn-sm"><strong>LC-Switch plugin</strong> - documentation here <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
                <?php $form->render(); ?>
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
