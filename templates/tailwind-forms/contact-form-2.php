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

$form = new Form('contact-form-2', 'vertical', 'novalidate', 'tailwind');
$form->setMode('development');
$form->startFieldset('Please fill in this form to contact us', '', 'class=text-2xl dark:text-white my-6')
    ->addInput('text', 'user-name', '', 'Your name : ', 'required')
    ->addInput('email', 'user-email', '', 'Your email : ', 'required')
    ->addHelper('Enter a valid US phone number', 'user-phone')
    ->addInput('text', 'user-phone', '', 'Your phone : ', 'data-intphone=true, data-fv-intphonenumber=true, data-initial-country=us, data-allow-dropdown=false, required')
    ->addTextarea('message', '', 'Your message : ', 'rows=7, required')
    ->centerContent()
    ->addCheckbox('newsletter', '', 1)
    ->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', true, 'class=mr-6 mb-6, data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=text-white bg-green-700')
    ->addRecaptchav3('6LcSY1oUAAAAAE6UUHkyTivIZvAO6DSU9Daqry8h')
    ->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in')
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
    <title>Tailwind Contact Form Vertical - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Contact Form Vertical with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/contact-form-2.php" />

    <!-- Tailwind CSS - for demo purposes only - replace with your Tailwind compilation -->

    <script src="https://cdn.tailwindcss.com"></script>

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

    <h1 class="text-center">Php Form Builder - Tailwind Contact Form Vertical</h1>

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <?php
            if (isset($sentMessage)) {
                echo $sentMessage;
            }
            $form->render();
            ?>
        </div>
    </div>

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
