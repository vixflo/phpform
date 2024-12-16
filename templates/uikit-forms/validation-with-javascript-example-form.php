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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('validation-with-jquery-example-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('validation-with-jquery-example-form');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['validation-with-jquery-example-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Validation with jQuery Example Form',
            'filter_values'   => 'validation-with-jquery-example-form, captcha'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('validation-with-jquery-example-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('validation-with-jquery-example-form', 'horizontal', 'novalidate', 'uikit');
$form->setMode('development');

$form->startFieldset('Validation using Native HTML5 fieldtypes / attributes', 'class=uk-fieldset', 'class=uk-legend uk-margin-bottom');

/* =============================================
    Validation using Native HTML5 fieldtypes
============================================= */

// Not Empty
$form->addInput('text', 'required-field', '', 'Not Empty', 'required');

// Email
$form->addInput('email', 'user-email', '', 'Email', 'required');

// URL
$form->addInput('url', 'user-url', '', 'Url', 'required');

// Textarea Not Empty
$form->addTextarea('message', '', 'Textarea Not Empty', 'rows=7, required');

// Range
$form->addHelper('Range between 5 &amp; 50', 'user-range');
$form->addInput('range', 'user-range', '', 'Range', 'min=5, max=50');

// Color
$form->addInput('color', 'user-color', '#33CC33', 'Color');

// Min
$form->addInput('number', 'user-min-number', '', 'Number Min. 50', 'min=50');

// Max
$form->addInput('number', 'user-max-number', '', 'Number Max. 50', 'max=50');

// Min Length / Max Length
$form->addInput('text', 'minlenght-maxlength-field', '', 'Min / Max Length', 'minlength=10, maxlength=20');

// Pattern
$form->addHelper('Lowercase only', 'user-pattern');
$form->addInput('text', 'user-pattern', '', 'Pattern', 'pattern=^[a-z]+$');

// Radio
$form->addRadio('radio-buttons', 'Yes', 'Yes');
$form->addRadio('radio-buttons', 'No', 'No');
$form->printRadioGroup('radio-buttons', 'Radio buttons', true, 'required');

$form->endFieldset();
$form->startFieldset('Validation using Custom HTML5 attributes (data)', 'class=uk-fieldset', 'class=uk-legend uk-margin-bottom');


/* =============================================
    Validation using Custom HTML5 attributes
============================================= */

// Choices
$form->addHelper('1 - 3 programming languages', 'choices');
$form->addCheckbox('choices', 'Java', 'Java', 'data-fv-choice, data-fv-choice___min=1, data-fv-choice___max=3, data-fv-choice___message=Please choose 1 - 3 programming languages');
$form->addCheckbox('choices', 'C/C++', 'C/C++');
$form->addCheckbox('choices', 'PHP', 'PHP');
$form->addCheckbox('choices', 'Perl', 'Perl');
$form->addCheckbox('choices', 'Ruby', 'Ruby');
$form->addCheckbox('choices', 'Python', 'Python');
$form->printCheckboxGroup('choices', 'Choices', true, 'required');

// Credit card number
$form->addInput('text', 'user-ccnum', '', 'Credit card number', 'data-fv-credit-card');

// Different
$form->addInput('text', 'user-different-fields-1', '', 'Different field 1');
$form->addInput('text', 'user-different-fields-2', '', 'Different field 2');

// Digits
$form->addInput('text', 'user-digits', '', 'Digits', 'data-fv-digits');

// EAN
$form->addInput('text', 'user-ean', '', 'EAN', 'data-fv-ean');

// Greater than
$form->addInput('number', 'user-number-greater-than', '', 'Number greater than 50', 'data-fv-greater-than, data-fv-greater-than___min=50');

// Hexadecimal number
$form->addInput('text', 'user-hex', '', 'Hexadecimal number', 'data-fv-hex');

// Identical
$form->addInput('password', 'user-pass', '', 'Password');
$form->addInput('password', 'user-pass-confirm', '', 'Confirm Password');

// Integer
$form->addInput('number', 'user-number', '', 'Integer', 'data-fv-integer');

// IP
$form->addInput('text', 'user-ip', '', 'IP', 'data-fv-ip');

// Phone
$form->addInput('text', 'user-phone', '', 'Phone (US)', 'data-fv-phone, data-fv-phone___country=US');

// Siren
$form->addInput('text', 'user-siren', '', 'SIREN', 'data-fv-siren');

// Siret
$form->addInput('text', 'user-siret', '', 'SIRET', 'data-fv-siret');

// lowercase
$form->addInput('text', 'user-lowercase', '', 'lowercase', 'data-fv-string-case, data-fv-string-case___case=lower');

// UPPERCASE
$form->addInput('text', 'user-uppercase', '', 'UPPERCASE', 'data-fv-string-case, data-fv-string-case___case=upper');

// Min/Max length
$form->addInput('text', 'user-stringlength', '', 'Min/Max length', 'data-fv-string-length, data-fv-string-length___min=10, data-fv-string-length___max=20');

// VAT
$form->addInput('text', 'user-vat', '', 'VAT (GB)', 'data-fv-vat, data-fv-vat___country=GB');

// Iban
$form->addInput('text', 'user-Iban', '', 'IBAN', 'placeholder=Iban, data-fv-iban');

// Zipcode
$form->addInput('text', 'user-zipcode', '', 'Zipcode (GB)', 'data-fv-zip-code, data-fv-zip-code___country=GB');

// Reset / Submit
$form->setCols(0, 12);
$form->centerContent();

$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="fas fa-ban uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-default', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// Pretty checkbox plugin
$options = [
    'color'       => 'primary',
    'animations'  => 'smooth'
];
$form->addPlugin('pretty-checkbox', '#validation-with-jquery-example-form', 'default', $options);

// Javascript validation
$form->addPlugin('formvalidation', '#validation-with-jquery-example-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Form with jQuery Live Validation - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create form with jQuery live validation using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/validation-with-javascript-example-form.php" />

    <!-- UIkit CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

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

    <h1 class="uk-text-center">Php Form Builder - Form with jQuery Live Validation<br><small>real time validation using jQuery validator plugin</small></h1>

    <div class="uk-container" style="min-width:70vw;">
        <div class="uk-container" style="min-width:70vw;">
            <div class="uk-text-center uk-margin-large-bottom">
                <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#javascript-validation-getting-started" class="uk-button uk-button-default uk-button-small"><strong>Javascript Validation plugin</strong> - documentation here <i class="fas fa-arrow-right uk-margin-left"></i></a>
            </div>
            <?php $form->render(); ?>
        </div>
        <?php
        if (isset($sentMessage)) {
            echo $sentMessage;
        }
        $form->render();
        ?>
    </div>

    <!-- UIkit JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        var form = forms['validation-with-jquery-example-form'];

        /* create a callback function to add the validators that we can't add with data-attributes */

        var fvCallback = function() {

            /* add the "different" validator to "user-different-fields-2" */

            form.fv.addField(
                'user-different-fields-2', {
                    validators: {
                        different: {
                            compare: function() {
                                return document.getElementById('user-different-fields-1').value;
                            },
                            message: 'The "Different field 2" must not be the same as "Different field 1"'
                        }
                    }
                }
            );
            form.fv.addField(
                'user-pass-confirm', {
                    validators: {
                        identical: {
                            compare: function() {
                                return document.getElementById('#user-pass').value;
                            },
                            message: '"Password" & "Confirm Password" must be identical'
                        }
                    }
                }
            );
        };
    </script>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
