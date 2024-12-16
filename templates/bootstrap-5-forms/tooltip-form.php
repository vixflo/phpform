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

$form = new Form('tooltip-form', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');

$form->startFieldset('Tooltips on input', '', 'class=text-center mb-4');

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

$form->startFieldset('Animated Tooltips', '', 'class=text-center mb-4');

$form->addInput('text', 'input-u', '', 'Fade', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=fade, required');

$form->addInput('text', 'input-i', '', 'Shift Away', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-away, required');

$form->addInput('text', 'input-o', '', 'Shift Toward', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=shift-toward, required');

$form->addInput('text', 'input-p', '', 'Scale', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=scale, required');

$form->addInput('text', 'input-q', '', 'perspective', 'data-tooltip=Lorem ipsum dolor sit amet\, consectetur adipiscing elit., data-animation=perspective, required');

$form->endFieldset();

/********************************************************/

$form->startFieldset('Tooltips on any text content', '', 'class=text-center mb-4');

// label tooltip
$form->addInput('text', 'input-s', '', 'Tooltip <span data-tooltip="I\'m a default tooltip">on label</span>', 'required');

// icon question sign
$form->addInput('text', 'input-d', '', 'Helper Tooltip <span class="bi bi-question-circle ms-2" data-tooltip="I\'m here to help users to fill-in the following field."></span>', 'required');

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

$form->startFieldset('Available styles', '', 'class=text-center mb-4');

$form->addHelper('Adds a shadows to your tooltips', 'input-q');
$form->addInput('text', 'input-g', '', 'Light theme', 'data-tooltip=I\'m a default tooltip, data-theme=light');

$form->addHelper('Adds a rounded corner to your tooltips', 'input-s');
$form->addInput('text', 'input-h', '', 'Light-border', 'data-tooltip=I\'m a tooltip, data-theme=light-border, required');

$form->addInput('text', 'input-j', '', 'Material', 'data-tooltip=I\'m a tooltip, data-theme=material, required');
$form->addInput('text', 'input-k', '', 'Translucent', 'data-tooltip=I\'m a tooltip, data-theme=translucent, required');

$form->endFieldset();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="bi bi-envelope-fill ms-2" aria-hidden="true"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');

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
    <title>Bootstrap 5 Form with Tooltips - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Form with tooltips using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/tooltip-form.php" />

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

    <!-- custom style for tooltips links -->
    <style>
        span[data-tooltip]:not(.fa) {
            border-bottom: 1px dotted #333;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Bootstrap 5 Form with tooltips</h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#tooltip-example" class="btn btn-secondary btn-sm"><strong>Tooltip plugin</strong> - documentation here <i class="bi bi-arrow-right ms-2"></i></a>
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
