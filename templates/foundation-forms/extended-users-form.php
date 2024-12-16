<?php

use phpformbuilder\Form;
use phpformbuilder\FormExtended;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

$numberOfUsers = 4;

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('extended-users-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('extended-users-form');

    // additional validation
    for ($i = 1; $i < $numberOfUsers; $i++) {
        $validator->email()->validate('email_professional-' . $i);
    }

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['extended-users-form'] = $validator->getAllErrors();
    } else {
        $options = array(
            'sender_email'     =>  'contact@phpformbuilder.pro',
            'recipient_email'  =>  addslashes($_POST['email_professional-1']),
            'subject'          =>  'contact from PHP Form Builder'
        );
        $sentMessage = Form::sendMail($options);
        Form::clear('extended-contact-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new FormExtended('extended-users-form', 'horizontal', 'novalidate', 'foundation');
$form->setMode('development');

for ($i = 1; $i < $numberOfUsers; $i++) {
    $form->startFieldset('User ' . $i);
    $form->addIdentity($i);
    $form->addBirth($i);
    $form->addHtml('<hr>');
    $form->addAddress($i);
    $form->addHtml('<hr>');
    $form->addContact($i);
    $form->endFieldset();
}
$form->addCancelSubmit();

// Javascript validation
$form->addPlugin('formvalidation', '#extended-users-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Extended Users Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create a complete Users Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/extended-users-form.php" />

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
    <style>
        fieldset {
            margin-bottom: 40px;
            padding: 20px 15px;
            background: #f7f7f7;
        }

        legend {
            padding: 5px 10px;
            font-size: 1.1rem;
            color: #fff;
            background: #666;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Extended Users Form<br><small>Build a complete users form with a very few lines of code</small></h1>

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
                <div class=" ">
                    <p>This form shows how you can create your own functions with the PHP FormExtended class.</p>
                    <p>Here, custom functions are called in a loop to create the fields for each user.</p>
                </div>
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
