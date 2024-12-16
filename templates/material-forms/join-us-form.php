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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('join-us-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('join-us-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['join-us-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Join Us Form',
            'filter_values'   => 'join-us-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('join-us-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('join-us-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

$form->setCols(0, 12);

$form->startFieldset('Join Us Form');

$form->addHtml('<h4 class="">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="material-icons">person</i>', 'before');
$form->addInput('text', 'user-name', '', 'Your Name', 'required');
$form->addIcon('user-email', '<i class="material-icons">email</i>', 'before');
$form->addInput('email', 'user-email', '', 'Email', 'required');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="material-icons right">lock_open</i>', 'class=btn waves-effect waves-light btn-large, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

$form->addHtml('<p class="text-right "><small><i class="material-icons left">lock</i>Your Information is Safe With us!</small></p>');

// Javascript validation
$form->addPlugin('formvalidation', '#join-us-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Join Us Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Join Us Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/join-us-form.php" />

    <!-- Materialize CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material icons CSS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Join Us Form<br><small>with Email sending</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
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

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#join-us-form'));
        });
    </script>

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
