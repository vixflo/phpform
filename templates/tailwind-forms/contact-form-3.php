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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-3') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-3');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-3'] = $validator->getAllErrors();
        // var_dump($_SESSION['errors']['contact-form-3']);
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-3'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-3');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-3', 'horizontal', 'novalidate', 'tailwind');
$form->setMode('development');
$form->setCols(0, 12);
$form->startFieldset('Please fill in this form to contact us', '', 'class=text-2xl dark:text-white my-6');
$form->setCols(0, 6);
$form->groupElements('user-name', 'user-first-name');
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name*, required');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="fas fa-phone" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addHelper('If other, please tell us more ... ', 'subject');
$form->addOption('subject', '', 'Your request concerns ...');
$form->addOption('subject', 'Support', 'Support', '', 'data-icon=fas fa-info mr-4 text-blue-500');
$form->addOption('subject', 'Sales', 'Sales', '', 'data-icon=fas fa-dollar-sign mr-4 text-amber-500');
$form->addOption('subject', 'Other', 'Other', '', 'data-icon=fas fa-question mr-4 text-red-500');
$form->addSelect('subject', '', 'data-slimselect=true');
$form->startDependentFields('subject', 'Other');
$form->addInput('text', 'subject-other', '', '', 'placeholder=Please tell more about your request ..., required');
$form->endDependentFields();
$form->addTextarea('message', '', '', 'placeholder=Your message ..., rows=7, required');
$form->addPlugin('tinymce', '#message');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', 1);
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=text-white bg-green-700');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-4" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="text-amber-500">* Required fields</p>');

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-3');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Contact Form with Rich Text Editor - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create a Contact Form with Rich Text Editor using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/contact-form-3.php" />

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

    <h1 class="text-center">Php Form Builder - Contact Form<br><small>with Rich Text Editor and Dependent Field</small></h1>

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
