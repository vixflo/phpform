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

$form = new Form('tooltip-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

$form->startFieldset('Tooltips on input');

$form->addInput('text', 'input-a', '', 'Default tooltip', 'data-tooltip=I\'m a default tooltip, required');

// Tooltip with HTML content
$form->addHtml('<template id="tooltip-html-content"><h5 class="px-3 py-2 bg-warning">Tooltip title</h5><p>You can add any HTML content here</p></template>');
$form->addInput('text', 'input-z', '', 'Tooltip with HTML content', 'required, data-tooltip=true, data-content-src=#tooltip-html-content, data-allow-html=true');

// Positioned tooltip
$form->addInput('text', 'input-r', '', 'Positioned tooltip', 'data-tooltip=I\'m on the bottom, data-placement=bottom, required');

// Tooltip on click
$form->addInput('text', 'input-t', '', 'Tooltip on click', 'data-tooltip=I\'m visible on click, data-trigger=click, required');

// Delayed tooltip
$form->addInput('text', 'input-y', '', 'Delayed tooltip', 'data-tooltip=I\'m a delayed tooltip, data-delay=2000, required');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Animated Tooltips');

$form->addInput('text', 'input-u', '', 'Fade', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=fade, required');

$form->addInput('text', 'input-i', '', 'Shift Away', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-away, required');

$form->addInput('text', 'input-o', '', 'Shift Toward', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-toward, required');

$form->addInput('text', 'input-p', '', 'Scale', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=scale, required');

$form->addInput('text', 'input-q', '', 'perspective', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=perspective, required');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Tooltips on any text content');

// label tooltip
$form->addInput('text', 'input-s', '', 'Tooltip <span data-tooltip="I\'m a default tooltip">on label</span>', 'required');

// icon question sign
$form->addInput('text', 'input-d', '', 'Helper Tooltip <span class="material-icons question_mark-circle right" data-tooltip="I\'m here to help users to fill-in the following field."></span>', 'required');

// helper
$form->addHelper('Do you need <span data-tooltip="I\'m a tooltip">more help</span>?', 'input-p');
$form->addInput('text', 'input-f', '', 'Tooltip on helper text', 'required');

// checkboxes
$form->addCheckbox('chkb', 'Checkbox', 1, 'checked');
$form->addCheckbox('chkb', 'Tooltip on a <span class="no-padding" data-tooltip="I\'m a tooltip">checkbox label</span>', 1, 'checked');
$form->printCheckboxGroup('chkb', 'Tooltip on <span data-tooltip="I\'m a tooltip">checkbox group label</span>');

// radio buttons
$form->addRadio('radbtn', 'Tooltip on a <span class="no-padding" data-tooltip="I\'m a tooltip">radio button label</span>', 0);
$form->addRadio('radbtn', 'Radio button', 1);
$form->printRadioGroup('radbtn', 'Tooltip on <span data-tooltip="I\'m a tooltip">radio group label</span>');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Available styles');

$form->addHelper('Adds a shadows to your tooltips', 'input-q');
$form->addInput('text', 'input-g', '', 'Light theme', 'data-tooltip=I\'m a default tooltip, data-theme=light');

$form->addHelper('Adds a rounded corner to your tooltips', 'input-s');
$form->addInput('text', 'input-h', '', 'Light-border', 'data-tooltip=I\'m a tooltip, data-theme=light-border, required');

$form->addInput('text', 'input-j', '', 'Material', 'data-tooltip=I\'m a tooltip, data-theme=material, required');
$form->addInput('text', 'input-k', '', 'Translucent', 'data-tooltip=I\'m a tooltip, data-theme=translucent, required');

$form->endFieldset();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="material-icons right" aria-hidden="true">email</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');

$form->addPlugin('tooltip', '[data-tooltip]');

// Javascript validation
$form->addPlugin('formvalidation', '#tooltip-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Form with Tooltips - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Form with tooltips using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/tooltip-form.php" />

    <!-- Materialize CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material icons CSS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>

    <!-- custom style for tooltips links -->
    <style>
        span[data-tooltip]:not(.fa) {
            border-bottom: 1px dotted #333;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Material Form with tooltips</h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <div class="center-align">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#tooltip-example" class="btn grey darken-1 waves-effect waves-light btn-small"><strong>Tooltip plugin</strong> - documentation here <i class="material-icons right">arrow_right</i></a>
                    <p>&nbsp;</p>
                </div>
                <?php $form->render(); ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#tooltip-form'));
        });
    </script>

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
