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

$form = new Form('order-form', 'vertical', 'novalidate', 'bs5');
$form->setMode('development');

$form->startFieldset('Order Form', '', 'class=text-center mb-4');

$form->startRow('mb-4');

$form->startCol(12);
$form->addHeading('Full name', 'label', 'class=form-label');
$form->endCol();

$form->endRow();
$form->startRow('mb-4');

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
$form->startRow('mb-4');

// start main col
$form->startCol(6);

// start nested row
$form->startRow();
$form->startCol(12);
$form->addInput('email', 'email', '', 'Email', 'required');
$form->endCol();
$form->endRow();

$form->startRow();

$form->startCol(12);
$form->addHeading('Contact Number', 'label', 'class=form-label');
$form->endCol();

$form->endRow();
$form->startRow('mb-4');

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

$form->addHelper('Street Address', 'street-address');
$form->addInput('text', 'street-address', '', 'Billing Address', 'required');
$form->addHelper('Street Address Line 2', 'street-address-2');
$form->addInput('text', 'street-address-2');

$form->startRow();

$form->startCol(6);
$form->addHelper('City', 'city');
$form->addInput('text', 'city', '', '', 'required');
$form->endCol();

$form->startCol(6);
$form->addHelper('State / Province', 'state');
$form->addInput('text', 'state');
$form->endCol();

$form->endRow();

$form->startRow('mb-4');

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
$form->addTextarea('additional-informations', '', 'Additional informations', 'rows=7, class=mb-4');
$form->endDependentFields();

$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Proceed <i class="bi bi-check-lg ms-2" aria-hidden="true"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');
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
    <title>Bootstrap 5 Order Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create an Bootstrap 5 Order Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/order-form.php" />

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
</head>

<body>

    <h1 class="text-center">Php Form Builder - Order Form<br><small>vertical form with custom rows &amp; columns</small></h1>

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
