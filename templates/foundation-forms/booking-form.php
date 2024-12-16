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

$form = new Form('booking-form', 'horizontal', 'novalidate', 'foundation');
$form->setMode('development');
$form->startFieldset('Please fill the form below', '', 'class=h4 text-center');
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
$form->addInput('text', 'date', '', 'Date / Time: ', 'data-litepick=true, data-min-date=' . date('Y-m-d') . ', required');
$form->setCols(0, 3);
$form->addHelper('Time', 'time');
$form->addTimeSelect('time', '', 'data-slimselect=true, data-show-search=false, data-allow-deselect=false, required', ['min' => '10:00', 'max' => '18:30', 'step' => 15]);
$form->setCols(4, 8);
$form->addOption('reservation-type', 'Dinner', 'Dinner', '', 'data-icon=fi-lightbulb prepend');
$form->addOption('reservation-type', 'Birthday/ Anniversary', 'Birthday/ Anniversary', '', 'data-icon=fi-star prepend');
$form->addOption('reservation-type', 'Nightlife', 'Nightlife', '', 'data-icon=fi-music prepend');
$form->addOption('reservation-type', 'Private', 'Private', '', 'data-icon=fi-lock prepend');
$form->addOption('reservation-type', 'Wedding', 'Wedding', '', 'data-icon=fi-heart prepend');
$form->addOption('reservation-type', 'Corporate', 'Corporate', '', 'data-icon=fi-address-book prepend');
$form->addOption('reservation-type', 'Other', 'Other', '', 'data-icon=fi-star prepend');
$form->addSelect('reservation-type', 'Reservation Type', 'data-slimselect=true, data-show-search=false, data-allow-deselect=false, required');
$form->startDependentFields('reservation-type', 'Other');
$form->addInput('text', 'reservation-type-other', '', '', 'placeholder=Please tell more ..., required');
$form->endDependentFields();
$form->addTextarea('special-request', '', 'Any Special Request?', 'rows=7');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit <i class="fi-arrow-right fa-fw"></i>', 'class=button primary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#booking-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Booking Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create a Contact Form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/booking-form.php" />

    <!-- Foundation CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">

    <!-- foundation icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Foundation Booking Form</h1>

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
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

    <!-- Foundation JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js" crossorigin="anonymous"></script>
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
