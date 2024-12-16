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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('car-rental-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('car-rental-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['car-rental-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Car Rental Form',
            'filter_values'   => 'car-rental-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('car-rental-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('car-rental-form', 'horizontal', 'data-accordion=true,novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#car-rental-form');


/* Accordion First part
-------------------------------------------------- */

$form->addHeading('Main rental informations');
$form->startFieldset();

// Locations lists
$locations = array(
    'Alabama',
    'Alaska',
    'Arizona',
    'Arkansas',
    'California',
    'Colorado',
    'Connecticut',
    'Delaware',
    'District of Columbia',
    'Florida',
    'Georgia',
    'Hawaii',
    'Idaho',
    'Illinois',
    'Indiana',
    'Iowa',
    'Kansas',
    'Kentucky',
    'Louisiana',
    'Maine',
    'Maryland',
    'Massachusetts',
    'Michigan',
    'Minnesota',
    'Mississippi',
    'Missouri',
    'Montana',
    'Nebraska',
    'Nevada',
    'New Hampshire',
    'New Jersey',
    'New Mexico',
    'New York',
    'North Carolina',
    'North Dakota',
    'Ohio',
    'Oklahoma',
    'Oregon',
    'Pennsylvania',
    'Rhode Island',
    'South Carolina',
    'South Dakota',
    'Tennessee',
    'Texas',
    'Utah',
    'Vermont',
    'Virginia',
    'Washington',
    'West Virginia',
    'Wisconsin',
    'Wyoming'
);

/* Pick up */

$form->setCols(3, 4, 'md');
$form->groupElements('pick-up-location', 'pick-up-date', 'pick-up-time');

foreach ($locations as $loc) {
    $form->addOption('pick-up-location', $loc, $loc);
}

$form->addSelect('pick-up-location', 'Pick up location', 'required');

// set minimum date
$now      = new DateTime('now');
$dateMin = $now->format('Y-m-d');

$form->setCols(0, 3, 'md');
$form->addHelper('Pick-up Date', 'pick-up-date');
$form->addInput('text', 'pick-up-date', '', '', 'data-litepick=true, data-single-mode=false, data-min-date=' . $dateMin . ', data-format=YYYY-MM-DD, data-element-end=drop-off-date, data-split-view=true, required');

$form->setCols(0, 2, 'md');
$form->addHelper('Pick-up Time', 'pick-up-time');
$form->addTimeSelect('pick-up-time', '', '', ['min' => '08:00', 'max' => '17:30', 'step' => 30]);

/* Drop Off */

$form->setCols(3, 4, 'md');
$form->groupElements('drop-off-location', 'drop-off-date', 'drop-off-time');

foreach ($locations as $loc) {
    $form->addOption('drop-off-location', $loc, $loc);
}

$form->addSelect('drop-off-location', 'Drop off location', 'required');

$form->setCols(0, 3, 'md');
$form->addHelper('Drop-off Date', 'drop-off-date');
$form->addInput('text', 'drop-off-date', '', '', 'readonly');

$form->setCols(0, 2, 'md');
$form->addHelper('Drop-off Time', 'drop-off-time');
$form->addTimeSelect('drop-off-time', '', '', ['min' => '08:00', 'max' => '17:30', 'step' => 30]);

/* Car type */

$form->setCols(3, 9, 'md');
$form->addRadio('car-type', 'Standart Cars', 'Standart Cars');
$form->addRadio('car-type', 'Convertibles', 'Convertibles');
$form->addRadio('car-type', 'Luxury Cars', 'Luxury Cars');
$form->addRadio('car-type', 'Vans', 'Vans');
$form->addRadio('car-type', 'SUVs', 'SUVs');
$form->printRadioGroup('car-type', 'Car Type', false, 'required');

$form->endFieldset();

/* Accordion Second part
-------------------------------------------------- */


$form->addHeading('Extras');
$form->startFieldset();

$form->addRadio('with', 'GPS navigation system', 'GPS navigation system');
$form->addRadio('with', 'Booster', 'Booster');
$form->addRadio('with', 'Child safety seat', 'Child safety seat');
$form->addRadio('with', 'Additional driver', 'Additional driver');
$form->printRadioGroup('with', 'With', false);
$form->addTextarea('additional-requests', '', 'Additional Requests', 'rows=7');

$form->endFieldset();

/* Accordion Third part
-------------------------------------------------- */


$form->addHeading('Personal informations');
$form->startFieldset();

$form->groupElements('prefix', 'first-name', 'last-name');
$form->setCols(3, 2, 'md');
$form->addOption('prefix', 'Mr', 'Mr');
$form->addOption('prefix', 'Mrs', 'Mrs');
$form->addSelect('prefix', 'Full Name', 'required');
$form->setCols(0, 3, 'md');
$form->addInput('text', 'first-name', '', 'First Name', 'required');
$form->setCols(0, 4, 'md');
$form->addInput('text', 'last-name', '', 'Last Name', 'required');
$form->setCols(3, 9, 'md');
$form->addInput('email', 'user-email', '', 'E-Mail', 'required');
$form->groupElements('area-code', 'user-phone');
$form->setCols(3, 2, 'md');
$form->addInput('text', 'area-code', '', 'Phone Number', 'placeholder=303, pattern=^[+0-9-]+$, data-fv-regexp___message=Please enter a valid Area Code, required');
$form->setCols(0, 7, 'md');
$form->addHelper('Enter a valid US phone number', 'user-phone');
$form->addInput('text', 'user-phone', '', '202-555-0119', 'data-fv-phone, data-fv-phone-country=US, required');

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary waves-effect waves-light mt-4');
$form->endFieldset();

// Custom radio & checkbox css
// $form->addPlugin('nice-check', '#car-rental-form', 'default', ['skin' => 'yellow']);

// Javascript validation
$form->addPlugin('formvalidation', '#car-rental-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Car Rental Form - Step Accordion form</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Step Accordion form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/car-rental-form.php" />

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
</head>

<body>

    <h1 class="text-center">Car Rental Form</h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
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
