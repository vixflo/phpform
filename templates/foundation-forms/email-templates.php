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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('email-templates') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('email-templates');

    // additional validation
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['email-templates'] = $validator->getAllErrors();
    } else {
        $replacements = array();

        if ($_POST['email-template'] !== 'custom') {
            // send default email
            $emailConfig = array(
                'sender_email'        => 'contact@phpformbuilder.pro',
                'sender_name'         => 'Php Form Builder',
                'recipient_email'     => addslashes($_POST['user-email']),
                'subject'             => 'Contact From Php Form Builder',
                'filter_values'       => 'email-templates',
                'debug'               => true
            );
            $sentMessage = Form::sendMail($emailConfig);
        }

        if ($_POST['email-template'] !== 'default') {
            // email HTML template placeholders replacements
            $replacements = array(
                'tpl-header-image'              => 'https://www.phpformbuilder.pro/assets/images/phpformbuilder-preview-600-160.png',
                'tpl-content-dark-background'   => '#363331',
                'tpl-content-light-background'  => '#FAF6F2',
                'user-full-name'                => $_POST['user-first-name'] . ' ' . $_POST['user-name']
            );

            $emailConfig = array(
                'sender_email'        => 'contact@phpformbuilder.pro',
                'sender_name'         => 'Php Form Builder',
                'recipient_email'     => addslashes($_POST['user-email']),
                'subject'             => 'Contact From Php Form Builder',
                'filter_values'       => 'email-templates',
                'template'            => 'custom.html',
                'custom_replacements' => $replacements,
                'debug'               => true
            );
            $sentMessage = Form::sendMail($emailConfig);
        }

        // reset the form
        Form::clear('email-templates');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('email-templates', 'vertical', 'novalidate', 'foundation');
$form->setMode('development');
$form->startFieldset('Please fill in this form to contact us', '', 'class=h4 text-center');
$form->addHtml('<p class=" text-right">All fields are required</p>');
$form->addInput('text', 'user-name', '', 'Name:', 'required');
$form->addInput('text', 'user-first-name', '', 'First name:', 'required');
$form->addInput('email', 'user-email', '', 'Email:', 'required');
$form->addTextarea('message', '', 'Message:', 'rows=7, required');

$form->addRadio('email-template', 'Send me an email built with the <strong><em>default template</em></strong>', 'default');
$form->addRadio('email-template', 'Send me an email built with a <strong><em>custom template</em></strong>', 'custom');
$form->addRadio('email-template', 'Send me <strong>both</strong> the <em>default</em> &amp; the <em>custom</em> emails', 'both');
$helperMessage = '<div class="mt-4 "><p>The <strong><em>default template</em></strong> generates a table with the posted keys/values. This table is automatically inserted into the email body.<br>The default template file is <em>phpformbuilder/mailer/email-templates/default.html</em></p><p>The <strong><em>custom template</em></strong> uses <em>placeholders</em> which are automatically replaced by the posted values.<br>For example <em>{user-name}</em> will be replaced in the email body by the posted user-name value. See <em>phpformbuilder/mailer/email-templates/custom.html</em></p></div>';
$form->addHelper($helperMessage, 'email-template');
$form->printRadioGroup('email-template', '', false, 'required');

$form->centerContent();

$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=text-center');

$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="input-group-label fi-x append" aria-hidden="true"></i>', 'class=button warning', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="input-group-label fi-mail append" aria-hidden="true"></i>', 'class=button primary, data-ladda-button=true, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// pretty-checkbox plugin
$options = [
    'icon'        => 'input-group-label fi-check',
    'plain'       => 'plain',
    'animations'  => 'smooth'
];
$form->addPlugin('pretty-checkbox', '#email-templates', 'default', $options);

// Javascript validation
$form->addPlugin('formvalidation', '#email-templates');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Form - Sending emails with PHP Form Builder - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to send emails with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/email-templates.php" />

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
</head>

<body>

    <h1 class="text-center">Php Form Builder - Foundation Form<br><small>sending emails using HTML/CSS email templates</small></h1>

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
                <div class="text-center">
                    <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#sendMail" class="btn button secondary small"><strong>Email sending</strong> - documentation here <i class="fi-arrow-right append"></i></a>
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
