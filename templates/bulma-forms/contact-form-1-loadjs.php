<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

$isLoadjsForm = true;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-1-loadjs') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-1-loadjs');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-1-loadjs'] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-1-loadjs'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-1-loadjs');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-1-loadjs', 'horizontal', 'novalidate', 'bulma');

// development mode is suitable when we use loadJs
$form->setMode('development');

// enable Loadjs loading & wait for the core bundle
$form->useLoadJs('core');

$form->startFieldset('Please fill in this form to contact us', '', 'class=pl-3 is-size-4 has-text-centered mb-4');
$form->addHtml('<p class="has-text-warning-dark pl-3">All fields are required</p>');
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
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=is-success');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=has-text-centered');
$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="fas fa-ban ml-2" aria-hidden="true"></i>', 'class=button is-warning', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-2" aria-hidden="true"></i>', 'class=button is-primary, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// word-character-count plugin
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-1-loadjs');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bulma Contact Form loaded with LoadJs - How to create PHP forms easily</title>
    <meta name="description" content="Bulma Form Generator - how to create a Contact Form with LoadJs and Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bulma-forms/contact-form-1-loadjs.php" />

    <!-- Bulma CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="has-text-centered is-size-1 mb-6">Php Form Builder - Bulma Horizontal Contact Form<br><small>with icons &amp; placeholders<br>Loaded with LoadJs Library</small></h1>

    <div class="is-fullwidth">

        <div class="container">

            <div class="columns is-justify-content-center">

                <div class="column is-11 is-10-widescreen">
                    <div class="has-text-centered mb-6">
                        <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#useLoadJs" class="button is-dark is-small"><strong>Async JS loading with LoadJS</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
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
    <!-- LoadJs -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/loadjs/3.5.5/loadjs.min.js"></script>

    <script defer type="text/javascript">
        // loading Font awesome icons with loadJs (core bundle)
        loadjs([
            'https://use.fontawesome.com/releases/v5.15.4/css/solid.css',
            'https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css'
        ], 'core', {
            async: false
        });

        // Core's loaded - do any stuff
        loadjs.ready('core', function() {
            console.log('Font awesome icons loaded');
        });
    </script>

    <?php
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
