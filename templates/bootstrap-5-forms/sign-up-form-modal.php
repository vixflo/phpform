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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('sign-up-modal-form-1') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('sign-up-modal-form-1');

    // additional validation
    $validator->hasLowercase()->hasUppercase()->hasNumber()->hasSymbol()->minLength(8)->validate('user-password');
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['sign-up-modal-form-1'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Sign Up Modal Form',
            'filter_values'   => 'sign-up-modal-form-1, captcha'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('sign-up-modal-form-1');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('sign-up-modal-form-1', 'vertical', 'novalidate', 'bs5');
$form->setMode('development');

$form->addInput('text', 'user-name', '', 'username', 'required');
$form->addInput('email', 'user-email', '', 'e-mail address', 'required');
$form->addPlugin('passfield', '#user-password', 'lower-upper-number-symbol-min-8');
$form->addHelper('password must contain lowercase + uppercase letters + number + symbol and be 8 characters long', 'user-password');
$form->addInput('password', 'user-password', '', 'password', 'required');
$form->centerContent();
$form->addBtn('reset', 'reset-btn', 1, 'Reset', 'class=btn btn-secondary, data-modal-close=modal-target', 'submit-group');
$form->addBtn('submit', 'submit-btn', 1, 'Sign Up <i class="bi bi-envelope-fill ms-2" aria-hidden="true"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

// modal
$form->modal();

// Javascript validation
$form->addPlugin('formvalidation', '#sign-up-modal-form-1');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Sign Up Modal Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Sign Up Modal Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/sign-up-form-modal.php" />

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

    <h1 class="text-center">Php Form Builder - Sign Up Modal Form<br><small>click to open Modal</small></h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#modal-example" class="btn btn-secondary btn-sm"><strong>Modal plugin</strong> - documentation here <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <button data-micromodal-trigger="modal-sign-up-modal-form-1" class="btn btn-primary btn-lg">Sign Up</button>
                <?php
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
