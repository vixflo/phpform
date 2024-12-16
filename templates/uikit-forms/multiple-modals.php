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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (Form::testToken('sign-up-modal-form-mp') === true) {
        // create validator & auto-validate required fields
        $validator = Form::validate('sign-up-modal-form-mp');

        // additional validation
        $validator->hasLowercase()->hasUppercase()->hasNumber()->hasSymbol()->minLength(8)->validate('sign-up-user-password');
        $validator->email()->validate('sign-up-user-email');

        // hcaptcha validation
        $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['sign-up-modal-form-mp'] = $validator->getAllErrors();
        } else {
            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => addslashes($_POST['sign-up-user-email']),
                'subject'         => 'Php Form Builder - Sign Up Modal Form',
                'filter_values'   => 'sign-up-modal-form-mp'
            );
            $sentMessage = Form::sendMail($emailConfig);
            Form::clear('sign-up-modal-form-mp');
        }
    } elseif (Form::testToken('contact-form-modal-mp') === true) {
        // create validator & auto-validate required fields
        $validator = Form::validate('contact-form-modal-mp');

        // additional validation
        $validator->maxLength(100)->validate('message');
        $validator->email()->validate('user-email');

        // hcaptcha validation
        $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['contact-form-modal-mp'] = $validator->getAllErrors();
        } else {
            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => addslashes($_POST['user-email']),
                'subject'         => 'Php Form Builder - Contact Form',
                'filter_values'   => 'contact-form-modal-mp'
            );
            $sentMessage = Form::sendMail($emailConfig);
            Form::clear('contact-form-modal-mp');
        }
    }
}

/* ==================================================
    The Sign Up Form
================================================== */

$form = new Form('sign-up-modal-form-mp', 'vertical', 'novalidate', 'uikit');
$form->setMode('development');
$form->addInput('text', 'sign-up-user-name', '', 'name', 'required');
$form->addInput('email', 'sign-up-user-email', '', 'e-mail address', 'required');
$form->addPlugin('passfield', '#sign-up-user-password', 'lower-upper-number-symbol-min-8');
$form->addHelper('password must contain lowercase + uppercase letters + number + symbol and be 8 characters long', 'sign-up-user-password');
$form->addInput('password', 'sign-up-user-password', '', 'password', 'required');
$form->centerContent();
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf');
$form->addBtn('button', 'sign-up-cancel-btn', 1, 'Cancel', 'class=uk-button uk-button-default, onclick=MicroModal.close(\'modal-sign-up-modal-form-mp\');', 'submit-group');
$form->addBtn('submit', 'sign-up-submit-btn', 1, 'Send <i class="uk-icon fas fa-envelope uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

// modal plugin
$form->modal();

// Javascript validation
$form->addPlugin('formvalidation', '#sign-up-modal-form-mp');

/* ==================================================
    The Contact Form
================================================== */

$form_2 = new Form('contact-form-modal-mp', 'horizontal', 'novalidate', 'uikit');
$form_2->setMode('development');

$form_2->startFieldset('Please fill in this form to contact us', 'class=uk-fieldset', 'class=uk-legend uk-margin-bottom');
$form_2->addHtml('<p class="uk-text-warning">All fields are required</p>');
$form_2->groupElements('user-name', 'user-first-name');
$form_2->setCols(0, 6);
$form_2->addIcon('user-name', '<i class="uk-form-icon fas fa-user" aria-hidden="true"></i>', 'before');
$form_2->addInput('text', 'user-name', '', '', 'placeholder=Name, required');
$form_2->addIcon('user-first-name', '<i class="uk-form-icon fas fa-user" aria-hidden="true"></i>', 'before');
$form_2->addInput('text', 'user-first-name', '', '', 'placeholder=First Name, required');
$form_2->setCols(0, 12);
$form_2->addIcon('user-email', '<i class="uk-form-icon fas fa-envelope" aria-hidden="true"></i>', 'before');
$form_2->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form_2->addIcon('user-phone', '<i class="uk-form-icon fas fa-phone" aria-hidden="true"></i>', 'before');
$form_2->addHtml('<span class="help-block">Enter a valid US phone number</span>', 'user-phone', 'after');
$form_2->addInput('text', 'user-phone', '', '', 'placeholder=Phone, data-fv-phone, data-fv-phone-country=US, required');
$form_2->addTextarea('message', '', '', 'rows=7, placeholder=Message, required');
$form_2->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));
$form_2->centerContent();
$form_2->addCheckbox('newsletter', 'Suscribe to Newsletter', 1, 'checked=checked');
$form_2->printCheckboxGroup('newsletter', '');
$form_2->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf');
$form_2->addBtn('reset', 'reset-btn', 1, 'Reset <i class="uk-icon fas fa-ban" aria-hidden="true"></i>', 'class=uk-button uk-button-default', 'my-btn-group');
$form_2->addBtn('submit', 'submit-btn', 1, 'Send <i class="uk-icon fas fa-envelope uk-margin-left" aria-hidden="true"></i>', 'class=uk-button uk-button-primary, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form_2->printBtnGroup('my-btn-group');
$form_2->endFieldset();

// icheck plugin
$form_2->addPlugin('nice-check', '#contact-form-modal-mp', 'default', ['skin' => 'teal']);

// modal plugin
$form_2->modal();

// Javascript validation
$form_2->addPlugin('formvalidation', '#contact-form-modal-mp');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIkit Multiple modal forms - How to create PHP forms easily</title>
    <meta name="description" content="UIkit Form Generator - how to create several modal forms on same page with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/multiple-modals.php" />

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
    <?php $form_2->printIncludes('css'); ?>
</head>

<body>

    <h1 class="uk-text-center">Php Form Builder - several Modal Forms on same page<br><small>click to sign up or contact</small></h1>

    <div class="uk-container" style="min-width:70vw;">

        <div class="uk-text-center uk-margin-large-bottom">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#modal-example" class="uk-button uk-button-default uk-button-small"><strong>Modal plugin</strong> - documentation here <i class="fas fa-arrow-right uk-margin-left"></i></a>
        </div>

        <?php
        if (isset($sentMessage)) {
            echo $sentMessage;
        }
        ?>
        <!-- Button trigger modal -->
        <div class="uk-text-center">
            <button data-micromodal-trigger="modal-sign-up-modal-form-mp" class="uk-button uk-button-primary text-white uk-button-large">Sign Up</button>
            <button data-micromodal-trigger="modal-contact-form-modal-mp" class="uk-button uk-button-primary text-white uk-button-large">Contact Us</button>
        </div>
        <?php
        $form->render();
        $form_2->render();
        ?>
    </div>

    <!-- UIkit JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>

    <?php
    $form->printIncludes('js');
    $form_2->printIncludes('js');
    $form->printJsCode();
    $form_2->printJsCode();
    ?>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
