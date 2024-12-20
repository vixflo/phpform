<?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

// Ajax response data
$data = array(
    'hasError' => true,
    'msg'      => ''
);

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('post-with-ajax-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('post-with-ajax-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['post-with-ajax-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Newsletter Subscribe Form posted with Ajax',
            'filter_values'   => 'post-with-ajax-form',
            'sent_message'    => '<div class="success callout"><p>Your message has been successfully sent !</p></div>'
        );
        $data['hasError'] = false;
        $data['msg'] = Form::sendMail($emailConfig);
        Form::clear('post-with-ajax-form');
    }
}

echo json_encode($data);
