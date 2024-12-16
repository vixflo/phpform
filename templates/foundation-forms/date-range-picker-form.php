<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('date-range-picker-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('date-range-picker-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['date-range-picker-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Date range picker form from Php Form Builder',
            'filter_values'   => 'date-range-picker-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('date-range-picker-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('date-range-picker-form', 'horizontal', 'novalidate', 'foundation');
$form->setMode('development');

// Simple date picker
$form->startFieldset('Simple date picker', '', 'class=h4 text-center');
$form->addInput('text', 'date-picker', '', 'Choose a date', 'data-litepick=true, data-number-of-months=1, data-number-of-columns=1, required');
$form->endFieldset();

// Simple date range picker
$form->startFieldset('Simple date range picker', '', 'class=h4 text-center');
$form->addInput('text', 'daterange-picker', '', 'Choose a date', 'data-litepick=true, data-single-mode=false, required');
$form->endFieldset();

// Date range picker with min & max date
// set minimum date
$now      = new DateTime('now');
$dateMin = $now->format('Y-m-d');

// set maximum date
$max      = $now->add(new DateInterval('P1M'));
$dateMax = $now->format('Y-m-d');

$form->startFieldset('Date range picker with minimum &amp; maximum date', '', 'class=h4 text-center');
$form->addHelper('The minimum date is set to the current day, the maximum date is one month later.', 'daterange-picker-min-max');
$form->addInput('text', 'daterange-picker-min-max', '', 'Choose a date', 'data-litepick=true, data-single-mode=false, data-min-date=' . $dateMin . ', data-max-date=' . $dateMax . ', required');
$form->endFieldset();

// Change the date format
$form->startFieldset('Change the date format', '', 'class=h4 text-center');
$form->addHelper('The plugin documentation about date formats is available here: <a href="https://wakirin.github.io/Litepicker/#option-format">https://wakirin.github.io/Litepicker/#option-format</a>', 'daterange-picker-date-format');
$form->addInput('text', 'daterange-picker-date-format', '', 'Choose a date', 'data-litepick=true, data-single-mode=false, data-format=YYYY-MM-DD, required');
$form->endFieldset();

// Change the language
$form->startFieldset('Change the language', '', 'class=h4 text-center');
$form->addInput('text', 'daterange-picker-language', '', 'Choose a date', 'data-litepick=true, data-single-mode=false, data-lang=fr-FR, required');
$form->endFieldset();


// Date range with range restricted to minimum 6 days + reset / submit buttons
$form->startFieldset('Date range with range restricted to minimum 6 days + reset / submit buttons', '', 'class=h4 text-center');

$form->addInput('text', 'daterange-picker-6-days', '', 'Choose start / end dates', 'data-litepick=true, data-single-mode=false, data-min-days=5, data-auto-apply=false, data-use-reset-btn=true, required');
$form->endFieldset();

// Date range in 2 separate fields + formatted dates
$form->startFieldset('Date range in 2 separate fields + formatted dates', '', 'class=h4 text-center');
$dateStartFieldName = 'date-start';
$dateEndFieldName   = 'date-end';

$form->groupElements($dateStartFieldName, $dateEndFieldName);

$form->setCols(4, 4);
$form->addInput('text', $dateStartFieldName, '', 'Choose start / end dates', 'data-litepick=true, data-single-mode=false, data-format=YYYY-MM-DD, data-element-end=' . $dateEndFieldName . ', required');
$form->setCols(0, 4);
$form->addInput('text', $dateEndFieldName, '', '', 'readonly, required');
$form->endFieldset();

// Date range in 2 separate fields + formatted dates + independent pickers + disabled dates
$form->startFieldset('Date range in 2 separate fields + formatted dates + independent pickers + disabled dates', '', 'class=h4 text-center');
$dateStartFieldName = 'date-start-2';
$dateEndFieldName   = 'date-end-2';

// set booked days from (now + 5 days) to (now + 10 days)
$now             = new DateTime('now');
$nowPlus_5days  = $now->add(new DateInterval('P5D'));
$bookedStart    = $nowPlus_5days->format('Y-m-d');

$now             = new DateTime('now');
$nowPlus_10days = $now->add(new DateInterval('P10D'));
$bookedEnd      = $nowPlus_10days->format('Y-m-d');

// add a single booked date
$now             = new DateTime('now');
$nowPlus_15days = $now->add(new DateInterval('P15D'));
$bookedSingle   = $nowPlus_15days->format('Y-m-d');

$form->groupElements($dateStartFieldName, $dateEndFieldName);

$form->setCols(4, 4);
$form->addInput('text', $dateStartFieldName, '', 'Choose start / end dates', 'data-litepick=true, data-single-mode=false, data-format=YYYY-MM-DD, data-element-end=' . $dateEndFieldName . ', data-disallow-booked-days-in-range=true, data-booked-days=[[\'' . $bookedStart . '\'\, \'' . $bookedEnd . '\']\, \'' . $bookedSingle . '\'], required');
$form->setCols(0, 4);
$form->addInput('text', $dateEndFieldName, '', '', 'readonly, required');
$form->endFieldset();

$form->startFieldset();
$form->setCols(4, 8);
$form->addInput('email', 'user-email', '', 'Your Email', 'placeholder=Email, required');
$form->endFieldset();

$form->centerContent();

$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=button primary');

// Javascript validation
$form->addPlugin('formvalidation', '#date-range-picker-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Date range picker Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create an Date range picker Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/date-range-picker-form.php" />

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

    <style>
        fieldset {
            margin-bottom: 40px;
            padding: 20px 15px;
            background: #f7f7f7;
        }

        legend {
            padding: 5px 10px;
            font-size: 1.1rem;
            color: #fff !important;
            background: #666;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Foundation Date range picker Form<br><small>with the <em>litepicker</em> picker plugin</small></h1>

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
                <div class="text-center">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#litepicker-example" class="btn button secondary small"><strong>Litepicker plugin</strong> - documentation here <i class="fi-arrow-right append"></i></a>
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
