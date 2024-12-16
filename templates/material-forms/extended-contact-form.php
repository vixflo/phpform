<?php

use phpformbuilder\Form;
use phpformbuilder\FormExtended;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('extended-contact-form') === true && FormExtended::validateContactForm('extended-contact-form')) {
    $options = array(
        'sender_email'     =>  'contact@phpformbuilder.pro',
        'recipient_email'  =>  addslashes($_POST['user-email']),
        'subject'          =>  'contact from PHP Form Builder'
    );
    $sentMessage = Form::sendMail($options);
    Form::clear('extended-contact-form');
}

/* ==================================================
    The Form
================================================== */

$form = new FormExtended('extended-contact-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

// Entire form is created with the following line !
$form->createContactForm();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Extended Contact Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create an Extended Contact Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/extended-contact-form.php" />

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

    <h1 class="text-center">Php Form Builder - Extended Contact Form<br><small>Build a complete contact form with a single line of code</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <pre class="language-php"><code>$form = new FormExtended('extended-contact-form', 'horizontal', 'novalidate', 'material');
$form->createContactForm();</code></pre>
                <div class=" ">
                    <p>The contact form below is built with just these 2 lines of code.</p>
                    <p>The <strong>FormExtended</strong> php class allows you to create your own functions. Here, for example, we call the <code>createContactForm()</code> function, which in turn calls all the functions needed to create the form (creation of fields, layout, plugins, ...)</p>
                    <p><a href="https://www.phpformbuilder.pro/documentation/class-doc.php#extending-main-class">https://www.phpformbuilder.pro/documentation/class-doc.php#extending-main-class</a></p>
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

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#extended-contact-form'));
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
