<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';


/* =============================================
    Select skin depending on poste value if any
============================================= */

$skin = 'purple';
if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('custom-radio-checkbox-css-form') === true && preg_match('`^[a-z]+$`', $_POST['change-skin'])) {
    $skin = $_POST['change-skin'];
}

// check the radio button corresponding to the selected skin
$_SESSION['custom-radio-checkbox-css-form']['change-skin'] = $skin;

/* ==================================================
    The Form
================================================== */

$form = new Form('custom-radio-checkbox-css-form', 'horizontal', 'novalidate', 'bulma');
// set mode to 'development' to avoid caching the nice-check plugin skin CSS
$form->setMode('development');
$form->startFieldset('CSS radio buttons &amp; Checkboxes<br><small class="has-text-grey-light">Built using the <em>Nice Check</em> plugin</small>', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->addRadio('vertical-radio', 'One', 1);
$form->addRadio('vertical-radio', 'Two', 2, 'checked');
$form->printRadioGroup('vertical-radio', 'Vertical radio buttons', false);
$form->addCheckbox('vertical-checkbox', 'First', 1);
$form->addCheckbox('vertical-checkbox', 'Second', 2, 'checked');
$form->addCheckbox('vertical-checkbox', 'Third', 3);
$form->printCheckboxGroup('vertical-checkbox', 'Vertical checkboxes', false);
$form->addRadio('horizontal-radio', 'One', 1, 'checked');
$form->addRadio('horizontal-radio', 'Two', 2, 'checked');
$form->printRadioGroup('horizontal-radio', 'horizontal radio buttons', true);
$form->addCheckbox('horizontal-checkbox', 'First', 1);
$form->addCheckbox('horizontal-checkbox', 'Second', 2);
$form->addCheckbox('horizontal-checkbox', 'Third', 3, 'checked');
$form->printCheckboxGroup('horizontal-checkbox', 'Horizontal checkboxes', true);
$form->endFieldset();

$form->addRadio('change-skin', 'Grey', 'grey');
$form->addRadio('change-skin', 'Red', 'red');
$form->addRadio('change-skin', 'Green', 'green');
$form->addRadio('change-skin', 'Blue', 'blue');
$form->addRadio('change-skin', 'Yellow', 'yellow');
$form->addRadio('change-skin', 'Purple', 'purple');
$form->printRadioGroup('change-skin', 'Choose your theme color', false, 'class=mb-4');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Change the theme color <i class="fas fa-tint ml-2" aria-hidden="true"></i>', 'class=button is-primary, data-ladda-button=true, data-style=zoom-in');

// Custom radio & checkbox css
$form->addPlugin('nice-check', '#custom-radio-checkbox-css-form', 'default', ['skin' => $skin]);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bulma Form with Custom CSS3 radio buttons and checkboxes - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create Custom CSS3 radio buttons and checkboxes">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/custom-radio-checkbox-css-form.php" />

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

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Bulma Form<br><small>with Custom CSS3 radio buttons and checkboxes</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <div class="has-text-centered mb-6">
                        <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#nice-check-example" class="button is-dark is-small"><strong>Nice check plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                    <?php
                    if (isset($sentMessage)) {
                        echo $sentMessage;
                    }
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
