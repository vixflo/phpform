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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-1-popover') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-1-popover');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-1-popover'] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-1-popover'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-1-popover');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-1-popover', 'horizontal', 'novalidate', 'tailwind');
$form->setMode('development');
$form->startFieldset('Please fill in this form to contact us', '', 'class=text-2xl dark:text-white my-6');
$form->addHtml('<p class="text-amber-500 mb-2">All fields are required</p>');
$form->groupElements('user-name', 'user-first-name');
$form->setCols(0, 6);
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name, required');
$form->addIcon('user-first-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name, required');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="fas fa-phone" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addTextarea('message', '', '', 'rows=7, placeholder=Message, required');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', '1');
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=text-white bg-green-700');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=text-center');
$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="fas fa-ban ml-4" aria-hidden="true"></i>', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-2 dark:focus:ring-amber-900', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-4" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// word-character-count plugin
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-1-popover');

// enable the popover plugin
$form->popover();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Popover Contact Form - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Popover Contact Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/contact-form-1-popover.php" />

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

    <h1 class="text-center">Php Form Builder - Tailwind Popover Contact Form</h1>

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <div class="text-center mb-10">
                <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#popover-example" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900 btn-sm"><strong>Popover forms</strong> - documentation here <i class="fas fa-arrow-right ml-4"></i></a>
            </div>
            <?php
            if (isset($sentMessage)) {
                echo $sentMessage;
            }
            $form->render();
            ?>
            <button data-popover-trigger="contact-form-1-popover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contact Us</button>
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
