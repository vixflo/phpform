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
            'filter_values'   => $formId
        );
        $sentMessage_2 = Form::sendMail($emailConfig);
        Form::clear($formId);

        echo '<script>MicroModal.show(\'modal-' . $formId . '\');</script>';
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form($formId, 'horizontal', 'novalidate', 'tailwind');
$form->setMode('development');

// enable Ajax loading
$form->setOptions(['ajax' => true]);

$form->setCols(0, 12);

$form->startFieldset();

if (isset($sentMessage_2)) {
    $form->addHtml($sentMessage_2);
}

$form->addHtml('<h4 class="mb-8">Get Free Email Updates!<br><small>Join us for FREE to get instant email updates!</small></h4>');
$form->addIcon('user-name', '<i class="fas fa-user"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'required, placeholder=Your Name');
$form->addIcon('user-email', '<i class="fas fa-envelope"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'required, placeholder=Email');
$form->centerContent();
$form->addBtn('button', 'cancel-btn', 1, 'Cancel', 'class=text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900, onclick=MicroModal.close(\'modal-ajax-join-us-form-modal\');', 'submit-group');
$form->addBtn('submit', 'submit-btn', 1, 'Get Access Today<i class="fas fa-unlock ml-4"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'submit-group');
$form->printBtnGroup('submit-group');

$form->addHtml('<p class="text-end mb-0"><small><i class="fas fa-lock mr-4"></i>Your Information is Safe With us!</small></p>');

$form->endFieldset();

// modal plugin
$form->modal();

// jQuery validation
$form->addPlugin('formvalidation', '#' . $formId);

$form->render();
