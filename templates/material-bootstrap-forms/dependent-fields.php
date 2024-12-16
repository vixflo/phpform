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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('dependent-fields') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('dependent-fields');

    // additional validation
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['dependent-fields'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Contact Form',
            'filter_values'   => 'dependent-fields'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('dependent-fields');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('dependent-fields', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#dependent-fields');


/* Select */

$form->startFieldset('Hidden fields depend on Select value');
$form->addHelper('If other, please tell us more ... ', 'subject');
$form->addOption('subject', 'Support', 'Support', '', 'data-icon=fas fa-lg fa-info-circle mr-2');
$form->addOption('subject', 'Sales', 'Sales', '', 'data-icon=fas fa-lg fa-dollar-sign mr-2');
$form->addOption('subject', 'Other', 'Other', '', 'data-icon=fas fa-lg fa-question-circle mr-2');
$form->addSelect('subject', 'Your request concerns ...', 'class=selectpicker, required');
$form->startDependentFields('subject', 'Other');
$form->addInput('text', 'subject-other', '', '', 'placeholder=Please tell more about your request ...');
$form->endDependentFields();

// preselect US
if (!isset($_SESSION['dependent-fields']['country'])) {
    $_SESSION['dependent-fields']['country'] = 'US';
}
$form->addHelper('Enter Additional informations if <strong>non-US</strong>', 'country');
$options = array(
    'plugin'       => 'bootstrap-select',
    'lang'         => 'en',
    'flags'        => true,
    'flag_size'    => 16,
    'return_value' => 'code',
);
$form->addCountrySelect('country', 'country: ', 'title=Select a country', $options);

// Inverted Dependent field - if non-US selected
$form->startDependentFields('country', 'US', true);
$form->addTextarea('additional-informations', '', 'Additional informations', 'rows=7');
$form->endDependentFields();
$form->endFieldset();

/* Radio */

$form->startFieldset('Hidden fields depend on Radio value');
$form->setCols(0, 12);
$form->addRadio('radio_group_1', 'Show dependent fields', 1);
$form->addRadio('radio_group_1', 'Hide dependent fields', 0);
$form->printRadioGroup('radio_group_1', '', true, 'required');
$form->startDependentFields('radio_group_1', 1);
$form->groupElements('civility', 'name');
$form->setCols(3, 2);
$form->addOption('civility', 'M.', 'M.');
$form->addOption('civility', 'Mrs', 'M<sup>rs</sup>');
$form->addOption('civility', 'Ms', 'M<sup>s</sup>');
$form->addSelect('civility', 'Civility', 'data-slimselect=true, required');
$form->setCols(2, 5);
$form->addInput('text', 'name', '', 'Name', 'required');
$form->setCols(3, 9);

// Dependent field inside previous one
$form->startDependentFields('civility', 'Mrs');
$form->addInput('text', 'maiden_name', '', 'Maiden Name');
$form->endDependentFields();
$form->endDependentFields();
$form->endFieldset();

/* Checkbox */

$form->startFieldset('Hidden fields depend on Checkbox value');
$form->addCheckbox('checkbox_group_1', 'Show', 1);
$form->addCheckbox('checkbox_group_1', 'Do nothing special', 0);
$form->printCheckboxGroup('checkbox_group_1', 'Show dependent field if "show" is checked');
$form->startDependentFields('checkbox_group_1', 1);
$form->addInput('text', 'your_name', '', 'Your Name');
$form->endDependentFields();

$form->addCheckbox('checkbox_group_2', 'Red', 'Red');
$form->addCheckbox('checkbox_group_2', 'Blue', 'Blue');
$form->addCheckbox('checkbox_group_2', 'Green', 'Green');
$form->addCheckbox('checkbox_group_2', 'Yellow', 'Yellow');
$form->printCheckboxGroup('checkbox_group_2', 'Show dependent field if any other than 1st is checked');
$form->startDependentFields('checkbox_group_2', 'Red', true);
$form->addRadio('are_you_sure', 'No', 0);
$form->addRadio('are_you_sure', 'Yes', 1);
$form->printRadioGroup('are_you_sure', 'Are you sure ?');
$form->endDependentFields();
$form->endFieldset();

/* Nested */

$form->startFieldset('Nested dependent fields');
$form->addRadio('level_1', 'Show level 1', 1);
$form->addRadio('level_1', 'Hide level 1', 0);
$form->printRadioGroup('level_1', '', true, 'required');

// START level 1
$form->startDependentFields('level_1', 1);

$form->addRadio('level_2', 'Show level 2', 1);
$form->addRadio('level_2', 'Hide level 2', 0);
$form->printRadioGroup('level_2', '', true, 'required');

// START level 2
$form->startDependentFields('level_2', 1);

$form->addInput('text', 'level-2-field', '', 'Level 2 field', 'required');

// END level 2
$form->endDependentFields();

// END level 1
$form->endDependentFields();

$form->endFieldset();

$form->addInput('email', 'user-email', '', 'Your email', 'required');

$form->setCols(0, 12);
$form->centerContent();
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=center-align');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-2" aria-hidden="true"></i>', 'class=btn btn-primary waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');

// Javascript validation
$form->addPlugin('formvalidation', '#dependent-fields');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Dependent fields Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Form with Dependent fields using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/dependent-fields.php" />

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
    <style>
        fieldset {
            margin-bottom: 40px;
            padding: 20px 15px;
            background: #f7f7f7;
        }

        legend {
            padding: 5px 10px;
            font-size: 1.1rem;
            color: #fff;
            background: #666;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Material Bootstrap Form with Dependent fields<br><small>Hidden fields shown if special values selected</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#dependent-fields-example" class="btn btn-secondary btn-sm"><strong>Dependent fields</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
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
