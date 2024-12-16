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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-2') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-2');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // recaptcha validation
    $validator->recaptcha('6LcSY1oUAAAAAHXz7K72uP2thZT7xhZ5zc9Q5Vgc', 'Recaptcha Error')->validate('g-recaptcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-2'] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-2'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-2');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-2', 'vertical', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#contact-form-2');

$form->startFieldset('Please fill in this form to contact us')
    ->addInput('text', 'user-name', '', 'Your name : ', 'required')
    ->addInput('email', 'user-email', '', 'Your email : ', 'required')
    ->addHelper('Enter a valid US phone number', 'user-phone')
    ->addInput('text', 'user-phone', '', 'Your phone : ', 'data-intphone=true, data-fv-intphonenumber=true, data-initial-country=us, data-allow-dropdown=false, required')
    ->addTextarea('message', '', 'Your message : ', 'rows=7, required')
    ->centerContent()
    ->addCheckbox('newsletter', '', 1)
    ->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', true, 'class=mr-3 mb-3, data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=bg-success')
    ->addRecaptchav3('6LcSY1oUAAAAAE6UUHkyTivIZvAO6DSU9Daqry8h')
    ->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary waves-effect waves-light, data-ladda-button=true, data-style=zoom-in')
    ->endFieldset()

    // word-character-count plugin
    ->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100))

    // Javascript validation
    ->addPlugin('formvalidation', '#contact-form-2');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Contact Form Vertical - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Contact Form Vertical with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/contact-form-2.php" />

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

    <h1 class="text-center">Php Form Builder - Material Bootstrap Contact Form Vertical</h1>

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
