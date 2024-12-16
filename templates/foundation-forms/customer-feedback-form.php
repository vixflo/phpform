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

$form = new Form('customer-feedback-form', 'horizontal', 'novalidate', 'foundation');
$form->setMode('development');
$form->startFieldset('Customer Feedback Form', '', 'class=text-center ');
$form->addheading('<em>You are encouraged to use the online feedback form below to send us your comments as well as any queries about our products.</em>', 'h5', 'class=text-center ');

// 1st row - left col
$form->addHtml('<div class="grid-x grid-padding-x">');
$form->addHtml('<div class="medium-6 cell">');
$form->addInput('text', 'customer-name', '', 'Customer Name', 'required');
$form->addInput('email', 'customer-email', '', 'E-Mail Address', 'required');
$form->addInput('text', 'organization', '', 'Organization');
$form->addHtml('</div>');

// 1st row - right col
$form->addHtml('<div class="medium-6 cell">');
$form->addOption('product-choice[]', 'Computers', 'Computers', '', 'data-icon=fi-laptop prepend');
$form->addOption('product-choice[]', 'Games', 'Games', '', 'data-icon=fi-die-five prepend');
$form->addOption('product-choice[]', 'Books', 'Books', '', 'selected, data-icon=fi-book prepend');
$form->addOption('product-choice[]', 'Music', 'Music', '', 'selected, data-icon=fi-music prepend');
$form->addOption('product-choice[]', 'Photos', 'Photos', '', 'data-icon=fi-camera prepend');
$form->addOption('product-choice[]', 'Films', 'Films', '', 'data-icon=fi-battery-full prepend');
$form->addHelper('(multiple choices)', 'product-choice[]');
$form->addSelect('product-choice[]', 'What products are you interested in ?', 'data-slimselect=true, multiple, required');
$form->addHtml('</div>');
$form->addHtml('</div>');

// 2nd row - left col
$form->addHtml('<div class="grid-x grid-padding-x">');
$form->addHtml('<div class="medium-6 cell">');
$form->addRadio('company-rating', 'Very High', 'Very High');
$form->addRadio('company-rating', 'High', 'High');
$form->addRadio('company-rating', 'Neutral', 'Neutral', 'checked=checked');
$form->addRadio('company-rating', 'Low', 'Low');
$form->addRadio('company-rating', 'Very Low', 'Very Low');
$form->printRadioGroup('company-rating', 'How would you rate our company ?', false, 'required');
$form->addHtml('</div>');

// 2nd row - right col
$form->addHtml('<div class="medium-6 cell">');
$form->addRadio('support-rating', 'Excellent', 'Excellent');
$form->addRadio('support-rating', 'Good', 'Good', 'checked=checked');
$form->addRadio('support-rating', 'Fair', 'Fair');
$form->addRadio('support-rating', 'Poor', 'Poor');
$form->addRadio('support-rating', 'Terrible', 'Terrible');
$form->printRadioGroup('support-rating', 'How would you rate our support ?', false, 'required');
$form->addHtml('</div>');
$form->addHtml('</div>');
$form->setCols(12, 12);
$form->addTextarea('comment', '', 'Do you have other comments for us ?', 'rows=7');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=button primary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="text-right"><strong class="">*</strong> Required fields</p>');

// Pretty Checkbox plugin
$options = [
    'icon'        => 'fi-check text-success',
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
    <title>Foundation Customer Feedback Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create a Customer Feedback Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/customer-feedback-form.php" />

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

    <h1 class="text-center">Php Form Builder - Customer Feedback Form</h1>

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
