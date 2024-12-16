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

$form = new Form('tooltip-form', 'horizontal', 'novalidate', 'tailwind');
$form->setMode('development');

$form->startFieldset('Tooltips on input', '', 'class=text-2xl dark:text-white my-6');

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

$form->startFieldset('Animated Tooltips', '', 'class=text-2xl dark:text-white my-6');

$form->addInput('text', 'input-u', '', 'Fade', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=fade, required');

$form->addInput('text', 'input-i', '', 'Shift Away', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-away, required');

$form->addInput('text', 'input-o', '', 'Shift Toward', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-toward, required');

$form->addInput('text', 'input-p', '', 'Scale', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=scale, required');

$form->addInput('text', 'input-q', '', 'perspective', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=perspective, required');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Tooltips on any text content', '', 'class=text-2xl dark:text-white my-6');

// label tooltip
$form->addInput('text', 'input-s', '', 'Tooltip <span data-tooltip="I\'m a default tooltip">on label</span>', 'required');

// icon question sign
$form->addInput('text', 'input-d', '', 'Helper Tooltip <span class="fas fa-question-circle ml-4" data-tooltip="I\'m here to help users to fill-in the following field."></span>', 'required');

// helper
$form->addHelper('Do you need <span data-tooltip="I\'m a tooltip">more help</span>?', 'input-p');
$form->addInput('text', 'input-f', '', 'Tooltip on helper text', 'required');

// checkboxes
$form->addCheckbox('chkb', 'Checkbox', 1, 'checked');
$form->addCheckbox('chkb', 'Tooltip on a <span data-tooltip="I\'m a tooltip">checkbox label</span>', 1, 'checked');
$form->printCheckboxGroup('chkb', 'Tooltip on <span data-tooltip="I\'m a tooltip">checkbox group label</span>');

// radio buttons
$form->addRadio('radbtn', 'Tooltip on a <span data-tooltip="I\'m a tooltip">radio button label</span>', 0);
$form->addRadio('radbtn', 'Radio button', 1);
$form->printRadioGroup('radbtn', 'Tooltip on <span data-tooltip="I\'m a tooltip">radio group label</span>');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Available styles', '', 'class=text-2xl dark:text-white my-6');

$form->addHelper('Adds a shadows to your tooltips', 'input-q');
$form->addInput('text', 'input-g', '', 'Light theme', 'data-tooltip=I\'m a default tooltip, data-theme=light');

$form->addHelper('Adds a rounded corner to your tooltips', 'input-s');
$form->addInput('text', 'input-h', '', 'Light-border', 'data-tooltip=I\'m a tooltip, data-theme=light-border, required');

$form->addInput('text', 'input-j', '', 'Material', 'data-tooltip=I\'m a tooltip, data-theme=material, required');
$form->addInput('text', 'input-k', '', 'Translucent', 'data-tooltip=I\'m a tooltip, data-theme=translucent, required');

$form->endFieldset();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-4" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in');

$form->addPlugin('tooltip', '[data-tooltip]');

// Custom radio & checkbox css
$form->addPlugin('nice-check', '#tooltip-form', 'default', ['skin' => 'red']);

// Javascript validation
$form->addPlugin('formvalidation', '#tooltip-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Form with Tooltips - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Form with tooltips using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/tooltip-form.php" />

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

    <!-- custom style for tooltips links -->
    <style>
        span[data-tooltip]:not(.fa) {
            border-bottom: 1px dotted #333;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Tailwind Form with tooltips</h1>

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <div class="text-center mb-10">
                <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#tooltip-example" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900 btn-sm"><strong>Tooltip plugin</strong> - documentation here <i class="fas fa-arrow-right ml-4"></i></a>
            </div>
            <?php $form->render(); ?>
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
