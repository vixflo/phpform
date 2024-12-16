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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('contact-form-1') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('contact-form-1');

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // Altcha validation
    $validator->altcha('Captcha Error')->validate('altcha');

    // get the altcha SPAM Filter data
    $spamFilterData = $validator->getAltchaSpamFilterData('altcha');

    if ($spamFilterData['score'] > 2) {
        $errorMessage = $validator->getAltchaSpamFilterErrorMessage();
        $validator->addError('altcha', $errorMessage);
    }

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['contact-form-1'] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => 'contact-form-1'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('contact-form-1');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('contact-form-1', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');
$form->startFieldset('Please fill in this form to contact us');
$form->addHtml('<p class="text-warning">All fields are required</p>');
$form->groupElements('user-name', 'user-first-name');
$form->setCols(0, 6);
$form->addIcon('user-name', '<i class="bi bi-person-fill" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name, required');
$form->addIcon('user-first-name', '<i class="bi bi-person-fill" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name, required');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="bi bi-envelope-fill" aria-hidden="true"></i>', 'before');
$form->addInput('date', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="bi bi-telephone-fill" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addTextarea('message', '', '', 'rows=7, placeholder=Message, required');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', '1', 'data-id=aaa');
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=bg-success');
$form->addAltcha(true);
$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="bi bi-x-lg ms-2" aria-hidden="true"></i>', 'class=btn btn-warning', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="bi bi-envelope-fill ms-2" aria-hidden="true"></i>', 'class=btn btn-primary ladda-button, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// word-character-count plugin
$form->addPlugin('word-character-count', '#message', 'default', array('maxAuthorized' => 100));

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-1');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Contact Form with Anti-SPAM</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Contact Form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/contact-form-1.php" />

    <!-- Bootstrap 5 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Bootstrap 5 Horizontal Contact Form<br><small>with icons &amp; placeholders</small></h1>

    <div class="container">

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

    <!-- Bootstrap 5 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
