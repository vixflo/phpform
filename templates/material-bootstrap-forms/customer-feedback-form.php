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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('customer-feedback-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('customer-feedback-form');

    // additional validation
    $validator->required('<br>Please rate')->validate('company-rating');
    $validator->required('<br>Please rate')->validate('support-rating');
    $validator->required('Please choose one or several product(s)')->validate('product-choice.0');
    $validator->email()->validate('customer-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['customer-feedback-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['customer-email']),
            'subject'         => 'Php Form Builder - Customer Feedback Form',
            'filter_values'   => 'customer-feedback-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('customer-feedback-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('customer-feedback-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#customer-feedback-form');

$form->startFieldset('Customer Feedback Form', '', 'class=center-align mb-5');
$form->addheading('<em>You are encouraged to use the online feedback form below to send us your comments as well as any queries about our products.</em>', 'h5', 'class=center-align mb-5');

// 1st row - left col
$form->addHtml('<div class="row">');
$form->addHtml('<div class="col m6">');
$form->addInput('text', 'customer-name', '', 'Customer Name', 'required');
$form->addInput('email', 'customer-email', '', 'E-Mail Address', 'required');
$form->addInput('text', 'organization', '', 'Organization');
$form->addHtml('</div>');

// 1st row - right col
$form->addHtml('<div class="col m6">');
$form->addOption('product-choice[]', 'Computers', 'Computers', '', 'data-icon=fas fa-lg fa-desktop mr-2');
$form->addOption('product-choice[]', 'Games', 'Games', '', 'data-icon=fas fa-lg fa-gamepad mr-2');
$form->addOption('product-choice[]', 'Books', 'Books', '', 'selected, data-icon=fas fa-lg fa-book mr-2');
$form->addOption('product-choice[]', 'Music', 'Music', '', 'selected, data-icon=fas fa-lg fa-headphones mr-2');
$form->addOption('product-choice[]', 'Photos', 'Photos', '', 'data-icon=fas fa-lg fa-camera-retro mr-2');
$form->addOption('product-choice[]', 'Films', 'Films', '', 'data-icon=fas fa-lg fa-film mr-2');
$form->addHelper('(multiple choices)', 'product-choice[]');
$form->addSelect('product-choice[]', 'What products are you interested in ?', 'data-slimselect=true, multiple, required');
$form->addHtml('</div>');
$form->addHtml('</div>');

// 2nd row - left col
$form->addHtml('<div class="row">');
$form->addHtml('<div class="col m6">');
$form->addRadio('company-rating', 'Very High', 'Very High');
$form->addRadio('company-rating', 'High', 'High');
$form->addRadio('company-rating', 'Neutral', 'Neutral', 'checked=checked');
$form->addRadio('company-rating', 'Low', 'Low');
$form->addRadio('company-rating', 'Very Low', 'Very Low');
$form->printRadioGroup('company-rating', 'How would you rate our company ?', false, 'required');
$form->addHtml('</div>');

// 2nd row - right col
$form->addHtml('<div class="col m6">');
$form->addRadio('support-rating', 'Excellent', 'Excellent');
$form->addRadio('support-rating', 'Good', 'Good', 'checked=checked');
$form->addRadio('support-rating', 'Fair', 'Fair');
$form->addRadio('support-rating', 'Poor', 'Poor');
$form->addRadio('support-rating', 'Terrible', 'Terrible');
$form->printRadioGroup('support-rating', 'How would you rate our support ?', false, 'required');
$form->addHtml('</div>');
$form->addHtml('</div>');
$form->setCols(12, 12);
$form->addTextarea('comment', '', 'Do you have other comments for us ?', 'rows=7, class=mb-5');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary waves-effect waves-light, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="text-right"><strong class="text-danger">*</strong> Required fields</p>');

// Pretty Checkbox plugin
$options = [
    'icon'        => 'fas fa-check fa-lg text-success',
    'plain'       => 'plain',
    'animations'  => 'smooth'
];
$form->addPlugin('pretty-checkbox', '#customer-feedback-form', 'default', $options);

// Javascript validation
$form->addPlugin('formvalidation', '#customer-feedback-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Customer Feedback Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Customer Feedback Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/customer-feedback-form.php" />

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

    <h1 class="text-center">Php Form Builder - Customer Feedback Form</h1>

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
