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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('join-us-modal-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('join-us-modal-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['join-us-modal-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Join Us Modal Form',
            'filter_values'   => 'join-us-modal-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('join-us-modal-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('join-us-modal-form', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');

$form->setCols(0, 12);

$form->startFieldset();

$form->addHtml('<h4 class="mb-4">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="bi bi-person-fill"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'required, placeholder=Your Name');
$form->addIcon('user-email', '<i class="bi bi-envelope-fill"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required, placeholder=Email');
$form->centerContent();
$form->addBtn('button', 'cancel-btn', 1, 'Cancel', 'class=btn btn-secondary, onclick=MicroModal.close(\'modal-join-us-modal-form\');', 'submit-group');
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="bi bi-unlock-fill ms-2"></i>', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

$form->endFieldset();

$form->addHtml('<p class="text-end mb-0"><small><i class="bi bi-lock-fill me-2"></i>Your Information is Safe With us!</small></p>');

// enable the modal plugin
$form->modal();

// Javascript validation
$form->addPlugin('formvalidation', '#join-us-modal-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Join Us Modal Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Join Us Modal Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/join-us-form-modal.php" />

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

    <h1 class="text-center">Php Form Builder - Join Us Modal Form<br><small>click to open Modal</small></h1>

    <div class="container">
        <div class="text-center mb-5">
            <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#modal-example" class="btn btn-secondary btn-sm"><strong>Modal plugin</strong> - documentation here <i class="bi bi-arrow-right ms-2"></i></a>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <!-- Button trigger modal -->
                <div class="text-center">
                    <button type="button" class="btn btn-primary text-white btn-lg" data-micromodal-trigger="modal-join-us-modal-form">Join us for FREE<i class="bi bi-unlock-fill ms-2"></i></button>
                </div>

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
