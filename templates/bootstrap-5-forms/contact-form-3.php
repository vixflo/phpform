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

$form = new Form('contact-form-3', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');
$form->setCols(0, 12);
$form->startFieldset('Please fill in this form to contact us', '', 'class=text-center mb-4');
$form->setCols(0, 6);
$form->groupElements('user-name', 'user-first-name');
$form->addIcon('user-name', '<i class="bi bi-person-fill" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name*, required');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name');
$form->setCols(0, 12);
$form->addIcon('user-email', '<i class="bi bi-envelope-fill" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="bi bi-telephone-fill" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');
$form->addHelper('If other, please tell us more ... ', 'subject');
$form->addOption('subject', '', 'Your request concerns ...');
$form->addOption('subject', 'Support', 'Support', '', 'data-icon=bi bi-info me-2 text-info');
$form->addOption('subject', 'Sales', 'Sales', '', 'data-icon=bi bi-currency-dollar me-2 text-warning');
$form->addOption('subject', 'Other', 'Other', '', 'data-icon=bi bi-question me-2 text-danger');
$form->addSelect('subject', '', 'data-slimselect=true');
$form->startDependentFields('subject', 'Other');
$form->addInput('text', 'subject-other', '', '', 'placeholder=Please tell more about your request ..., required');
$form->endDependentFields();
$form->addTextarea('message', '', '', 'placeholder=Your message ..., rows=7, required');
$form->addPlugin('tinymce', '#message');
$form->centerContent(true, true);
$form->addCheckbox('newsletter', '', 1);
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=bg-success');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="bi bi-envelope-fill ms-2" aria-hidden="true"></i>', 'class=btn btn-primary btn-lg, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();
$form->addHtml('<p class="text-warning">* Required fields</p>');

// Javascript validation
$form->addPlugin('formvalidation', '#contact-form-3');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Contact Form with Rich Text Editor - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a Contact Form with Rich Text Editor using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/contact-form-3.php" />

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

    <h1 class="text-center">Php Form Builder - Contact Form<br><small>with Rich Text Editor and Dependent Field</small></h1>

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
