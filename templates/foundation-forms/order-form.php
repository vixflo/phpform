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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('order-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('order-form');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['order-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['email']),
            'subject'         => 'Php Form Builder - Order Form',
            'filter_values'   => 'order-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('order-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('order-form', 'vertical', 'novalidate', 'foundation');
$form->setMode('development');

$form->startFieldset('Order Form', '', 'class=h4 text-center');

$form->startRow('');

$form->startCol(12);
$form->addHeading('Full name', 'label', 'class=small-12 cell');
$form->endCol();

$form->endRow();
$form->startRow('');

$form->startCol(6);
$form->addHelper('First name', 'first-name');
$form->addInput('text', 'first-name', '', '', 'required');
$form->endCol();

$form->startCol(6);
$form->addHelper('Last name', 'last-name');
$form->addInput('text', 'last-name', '', '', 'required');
$form->endCol();

$form->endRow();

// start main row
$form->startRow('');

// start main col
$form->startCol(6);

// start nested row
$form->addInput('email', 'email', '', 'Email', 'required');

$form->startRow();

$form->startCol(12);
$form->addHeading('Contact Number', 'label', 'class=small-12 cell');
$form->endCol();

$form->endRow();
$form->startRow('');

$form->startCol(4);
$form->addHelper('Area Code', 'area-code');
$form->addInput('text', 'area-code', '', '', 'data-fv-regexp=true, data-fv-regexp___regexp=[+0-9-]+, data-fv-regexp___message=Please enter a valid Area Code, required');
$form->endCol();

$form->startCol(8);
$form->addHelper('Valid US Phone Number', 'phone-number');
$form->addInput('text', 'phone-number', '', '', 'data-fv-phone, data-fv-phone___country=US, required');
$form->endCol();

// end nested row
$form->endRow();

// end main col
$form->endCol();

// start main col
$form->startCol(6);

$form->addRadio('payment-method', '<img src="../assets/img/cb.png" alt="credit card">', 'credit-card');
$form->addRadio('payment-method', '<img src="../assets/img/paypal.png" alt="paypal">', 'paypal');
$form->printRadioGroup('payment-method', 'Payment Method', false);

// end main col
$form->endCol();

// end main row
$form->endRow();

$form->startRow();

$form->startCol(12);
$form->addHeading('Billing Address', 'label', 'class=small-12 cell');
$form->endCol();

$form->startCol(12);
$form->addHelper('Street Address', 'street-address');
$form->addInput('text', 'street-address', '', '', 'required');
$form->endCol();

$form->startCol(12);
$form->addHelper('Street Address Line 2', 'street-address-2');
$form->addInput('text', 'street-address-2');
$form->endCol();

$form->startCol(6);
$form->addHelper('City', 'city');
$form->addInput('text', 'city', '', '', 'required');
$form->endCol();

$form->startCol(6);
$form->addHelper('State / Province', 'state');
$form->addInput('text', 'state');
$form->endCol();

$form->endRow();

$form->startRow('');

$form->startCol(6);
$form->addHelper('Postal / Zip Code', 'zip-code');
$form->addInput('text', 'zip-code', '', '', 'required');
$form->endCol();

$form->startCol(6);
$form->addHelper('Country', 'country');

// preselect US
if (!isset($_SESSION['order-form']['country'])) {
    $_SESSION['order-form']['country'] = 'US';
}
$form->addCountrySelect('country', '', '', array('flag_size' => 32, 'return_value' => 'code', 'placeholder' => 'Select your country'));
$form->endCol();

$form->endRow();

// Inverted Dependent field - if non-US selected
$form->startDependentFields('country', 'US', true);
$form->addTextarea('additional-informations', '', 'Additional informations', 'rows=7, class=');
$form->endDependentFields();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Proceed <i class="fi-check append" aria-hidden="true"></i>', 'class=button primary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Custom radio & checkbox css
$form->addPlugin('nice-check', '#order-form', 'default', ['skin' => 'red']);

// Javascript validation
$form->addPlugin('formvalidation', '#order-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Order Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create an Foundation Order Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/order-form.php" />

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

    <h1 class="text-center">Php Form Builder - Order Form<br><small>vertical form with custom rows &amp; columns</small></h1>

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
