<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

$formId = 'ajax-join-us-form-modal';

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken($formId) === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate($formId);

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors'][$formId] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Join Us Modal Form',
            'filter_values'   => $formId,
            'sent_message'    => '<p class="card-panel teal accent-2">Your message has been successfully sent !</p>'
        );
        $sentMessage_2 = Form::sendMail($emailConfig);
        Form::clear($formId);

        echo '<script>MicroModal.show(\'modal-' . $formId . '\');</script>';
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form($formId, 'horizontal', 'novalidate', 'material');
// $form->setMode('development');

// enable Ajax loading
$form->setOptions(['ajax' => true]);

$form->setCols(0, 12);

$form->startFieldset();

if (isset($sentMessage_2)) {
    $form->addHtml($sentMessage_2);
}

$form->addHtml('<h4 class="">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="material-icons">person</i>', 'before');
$form->addInput('text', 'user-name', '', 'Your Name', 'required');
$form->addIcon('user-email', '<i class="material-icons">email</i>', 'before');
$form->addInput('email', 'user-email', '', 'Your Email', 'required');
$form->centerContent();
$form->addBtn('button', 'cancel-btn', 1, 'Cancel', 'class=btn grey darken-1 waves-effect waves-light, onclick=MicroModal.close(\'modal-ajax-join-us-form-modal\');', 'submit-group');
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="material-icons right">lock_open</i>', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

$form->addHtml('<p class="text-right"><small><i class="material-icons left">lock</i>Your Information is Safe With us!</small></p>');

$form->endFieldset();

// modal plugin
$form->modal();

// jQuery validation
$form->addPlugin('formvalidation', '#' . $formId);

$form->render();
