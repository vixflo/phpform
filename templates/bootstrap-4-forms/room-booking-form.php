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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('room-booking-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('room-booking-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['room-booking-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Room Booking Form',
            'filter_values'   => 'room-booking-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('room-booking-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('room-booking-form', 'horizontal', 'novalidate', 'bs4');
$form->setMode('development');

$form->startFieldset('Book a Room', '', 'class=text-center mb-4');
$form->setCols(3, 4);
$form->groupElements('first-name', 'last-name');
$form->addHelper('First name', 'first-name');
$form->addInput('text', 'first-name', '', 'Full Name : ', 'required');
$form->setCols(0, 5);
$form->addHelper('Last name', 'last-name');
$form->addInput('text', 'last-name', '', '', 'required');
$form->setCols(3, 9);
$form->addInput('email', 'user-email', '', 'E-Mail : ', 'placeholder=email@example.com, required');
$form->addInput('text', 'phone-number', '', 'Phone Number : ', 'required');

// set minimum date
$now      = new DateTime('now');
$dateMin = $now->format('Y-m-d');
$form->addInput('text', 'arrival-date', '', 'Arrival Date', 'data-litepick=true, data-min-date=' . $dateMin . ', required');

$form->groupElements('number-of-nights', 'number-of-guests');
for ($i = 1; $i <= 30; $i++) {
    $form->addOption('number-of-nights', $i, (string) $i);
}
$form->addOption('number-of-nights', 'more than 30', '30 +');
$form->setCols(3, 3);
$form->addIcon('number-of-nights', '<i class="fas fa-bed"></i>', 'before');
$form->addSelect('number-of-nights', 'Number of Nights', 'data-slimselect=true, required');
for ($i = 1; $i <= 10; $i++) {
    $form->addOption('number-of-guests', $i, (string) $i);
}
$form->addOption('number-of-guests', 'more than 10', '10 +');
$form->addIcon('number-of-guests', '<i class="fas fa-user-plus"></i>', 'before');
$form->addSelect('number-of-guests', 'Number of Guests', 'data-slimselect=true, required');
$form->addPlugin('tinymce', '#additional-informations', 'contact-config');
$form->setCols(3, 9);
$form->addTextarea('additional-informations', '', 'Additional Informations', 'rows=7');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary mt-4, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#room-booking-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Room Booking Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create a Room Booking Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/room-booking-form.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
    <h1 class="text-center">Php Form Builder - Room Booking Form<br><small>with Rich Text Editor and date picker</small></h1>
    <div class="container">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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