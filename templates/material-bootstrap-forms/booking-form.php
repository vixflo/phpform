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

// materialize plugin
$form->addPlugin('materialize', '#booking-form');

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
$form->addOption('reservation-type', 'Dinner', 'Dinner', '', 'data-icon=fas fa-lg fa-utensils mr-2');
$form->addOption('reservation-type', 'Birthday/ Anniversary', 'Birthday/ Anniversary', '', 'data-icon=fas fa-lg fa-envelope mr-2');
$form->addOption('reservation-type', 'Nightlife', 'Nightlife', '', 'data-icon=fas fa-lg fa-moon mr-2');
$form->addOption('reservation-type', 'Private', 'Private', '', 'data-icon=fas fa-lg fa-user-secret mr-2');
$form->addOption('reservation-type', 'Wedding', 'Wedding', '', 'data-icon=fas fa-lg fa-heart mr-2');
$form->addOption('reservation-type', 'Corporate', 'Corporate', '', 'data-icon=fas fa-lg fa-briefcase mr-2');
$form->addOption('reservation-type', 'Other', 'Other', '', 'data-icon=fas fa-lg fa-star mr-2');
$form->addSelect('reservation-type', 'Reservation Type', 'data-slimselect=true, data-show-search=false, data-allow-deselect=false, required');
$form->startDependentFields('reservation-type', 'Other');
$form->addInput('text', 'reservation-type-other', '', 'Please tell more ...', 'required');
$form->endDependentFields();
$form->addTextarea('special-request', '', 'Any Special Request?', 'rows=7');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit <i class="fas fa-lg fa-arrow-right fa-fw"></i>', 'class=btn btn-primary waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');
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
    <title>Material Bootstrap Booking Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Contact Form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/booking-form.php" />

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

    <h1 class="text-center">Php Form Builder - Material Bootstrap Booking Form</h1>

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
