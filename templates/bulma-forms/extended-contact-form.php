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

$form = new FormExtended('extended-contact-form', 'horizontal', 'novalidate', 'bulma');
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
    <title>Bulma Extended Contact Form - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create an Extended Contact Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/extended-contact-form.php" />

    <!-- Bulma CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

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

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Extended Contact Form<br><small>Build a complete contact form with a single line of code</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <pre class="language-php"><code>$form = new FormExtended('extended-contact-form', 'horizontal', 'novalidate', 'bulma');
$form->createContactForm();</code></pre>
                    <div class="mt-5 mb-6">
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
