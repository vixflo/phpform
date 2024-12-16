<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

$formId = 'ajax-contact-form-1';

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken($formId) === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate($formId);

    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors'][$formId] = $validator->getAllErrors();
    } else {
        $_POST['message'] = nl2br($_POST['message']);
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Contact from Php Form Builder',
            'filter_values'   => $formId
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear($formId);
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form($formId, 'horizontal', 'novalidate', 'bs4');
$form->setMode('development');

// enable Ajax loading
$form->setOptions(['ajax' => true]);

$form->startFieldset('Please fill in this form to contact us', '', 'class=text-center mb-4');
$form->addHtml('<p class="small text-danger text-right">All fields are required</p>');
$form->groupElements('user-name', 'user-first-name');
$form->setCols(0, 6);
$form->addIcon('user-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', '', 'placeholder=Name, required');
$form->addIcon('user-first-name', '<i class="fas fa-user" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-first-name', '', '', 'placeholder=First Name, required');
$form->groupElements('user-email', 'user-phone');
$form->addIcon('user-email', '<i class="fas fa-envelope" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', '', 'placeholder=Email, required');
$form->addIcon('user-phone', '<i class="fas fa-phone" aria-hidden="true"></i>', 'before');
$form->addInput('tel', 'user-phone', '', '', 'data-intphone=true, required');
$form->setCols(0, 12);
$form->addTextarea('message', '', '', 'rows=7, placeholder=Message, required');
$form->setOptions(['elementsWrapper' => '<div class="form-group row text-center mb-5"></div>']);
$form->setCols(12, 12);
$form->addCheckbox('newsletter', '', '1');
$form->printCheckboxGroup('newsletter', 'Suscribe to Newsletter', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncss=bg-success');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf');
$form->centerContent();
$form->setCols(0, 12);
$form->addBtn('reset', 'reset-btn', 1, 'Reset <i class="fas fa-ban ml-2" aria-hidden="true"></i>', 'class=btn btn-warning', 'my-btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="fas fa-envelope ml-2" aria-hidden="true"></i>', 'class=btn btn-primary, data-style=zoom-in', 'my-btn-group');
$form->printBtnGroup('my-btn-group');
$form->endFieldset();

// word-character-count plugin
$form->addPlugin('word-character-count', '#message', 'default', array('maxCharacters' => 100, 'wrapperClassName' => 'help-block text-right'));

// Javascript validation
$form->addPlugin('formvalidation', '#' . $formId);

if (isset($sentMessage)) {
    echo $sentMessage;
}
$form->render();
