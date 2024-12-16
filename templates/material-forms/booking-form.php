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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('booking-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('booking-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['booking-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Booking Form',
            'filter_values'   => 'booking-form, date_submit, time_submit',
            'debug' => true
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('booking-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('booking-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');
$form->startFieldset('Please fill the form below');
$form->setCols(4, 4);
$form->groupElements('first-name', 'last-name');
$form->addHelper('First name', 'first-name');
$form->addInput('text', 'first-name', '', 'Full Name : ', 'required');
$form->setCols(0, 4);
$form->addHelper('Last name', 'last-name');
$form->addInput('text', 'last-name', '', '', 'required');
$form->setCols(4, 8);
$form->addInput('email', 'user-email', '', 'E-Mail : ', 'required');
$form->addHelper('Enter a valid phone number', 'phone-number');
$form->addInput('tel', 'user-phone', '', 'Phone Number : ', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addInput('number', 'number-of-guests', '', 'Number of Guests: : ', 'data-fv-integer, required');
$form->setCols(4, 5);
$form->groupElements('date', 'time');
$form->addHelper('Date', 'date');
$form->addInput('text', 'date', '', 'Date / Time: ', 'data-min-date=' . date('Y-m-d') . ', required');
$form->setCols(0, 3);
$form->addHelper('Time', 'time');
$form->addTimeSelect('time', '', 'data-slimselect=true, data-show-search=false, data-allow-deselect=false, required', ['min' => '10:00', 'max' => '18:30', 'step' => 15]);
$form->setCols(4, 8);
$form->addOption('reservation-type', 'Dinner', 'Dinner', '', 'data-icon=material-icons local_dining');
$form->addOption('reservation-type', 'Birthday/ Anniversary', 'Birthday/ Anniversary', '', 'data-icon=material-icons cake');
$form->addOption('reservation-type', 'Nightlife', 'Nightlife', '', 'data-icon=material-icons nightlight');
$form->addOption('reservation-type', 'Private', 'Private', '', 'data-icon=material-icons key');
$form->addOption('reservation-type', 'Wedding', 'Wedding', '', 'data-icon=material-icons heart');
$form->addOption('reservation-type', 'Corporate', 'Corporate', '', 'data-icon=material-icons work');
$form->addOption('reservation-type', 'Other', 'Other', '', 'data-icon=material-icons star');
$form->addSelect('reservation-type', 'Reservation Type', 'data-slimselect=true, data-show-search=false, data-allow-deselect=false, required');
$form->startDependentFields('reservation-type', 'Other');
$form->addInput('text', 'reservation-type-other', '', 'Please tell more ...', 'required');
$form->endDependentFields();
$form->addTextarea('special-request', '', 'Any Special Request?', 'rows=7');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit <i class="material-icons">arrow_right</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// material datepicker
$form->addPlugin('material-datepicker', '#date');

// Javascript validation
$form->addPlugin('formvalidation', '#booking-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Booking Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Contact Form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/booking-form.php" />

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
</head>

<body>

    <h1 class="text-center">Php Form Builder - Material Booking Form</h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
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

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#booking-form'));
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
