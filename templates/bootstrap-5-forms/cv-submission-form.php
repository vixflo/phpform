<?php

use fileuploader\server\FileUploader;
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once $root . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('cv-submission-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('cv-submission-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['cv-submission-form'] = $validator->getAllErrors();
    } else {
        /* Send email with attached file(s) */

        $path = $root . '/file-uploads/';
        $attachments = array();
        if (isset($_POST['cv']) && !empty($_POST['cv'])) {
            $cv = FileUploader::getPostedFiles($_POST['cv']);
            foreach ($cv as $f) {
                $attachments[] = $path . $f['file'];
            }
            $attachments = implode(', ', $attachments);
        }

        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - CV Submission Form',
            'attachments'    =>  $attachments,
            'filter_values'   => 'cv-submission-form, cv'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('cv-submission-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('cv-submission-form', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');
$form->setCols(3, 9);
$form->startFieldset('Do you want to work with us?<br><small class="text-muted">Please fill in your details below</small>.', '', 'class=text-center mb-4');
$form->addIcon('user-name', '<i class="bi bi-person-fill" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name', '', 'Name', 'required');
$form->addIcon('user-first-name', '<i class="bi bi-person-fill" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-first-name', '', 'Firstname', 'required');
$form->addIcon('user-email', '<i class="bi bi-envelope-fill" aria-hidden="true"></i>', 'before');
$form->addInput('email', 'user-email', '', 'Email', 'required');
$form->addInput('text', 'position-applying-for', '', 'Position Applying For');
$form->addPlugin('tinymce', '#additional-information', 'light');
$form->addTextarea('additional-information', '', 'Additional Information', 'rows=7');

$form->addHelper('Your CV is required. 3 files max. Accepted File Types : .pdf, .doc[x], .xls[x], .txt', 'cv');

// reload the previously posted file if the form was posted with errors
$currentFile = [];
if (isset($_POST['cv']) && !empty($_POST['cv']) && isset($_SESSION['errors']['cv-submission-form']) && !empty($_SESSION['errors']['cv-submission-form'])) {
    $postedFile = FileUploader::getPostedFiles($_POST['cv']);
    $currentFile_path = $root . '/file-uploads/';
    $currentFile_name = $postedFile[0]['file'];
    if (file_exists($currentFile_path . $currentFile_name)) {
        $currentFile_size = filesize($currentFile_path . $currentFile_name);
        $currentFile_type = mime_content_type($currentFile_path . $currentFile_name);
        $currentFile = array(
            'name' => $currentFile_name,
            'size' => $currentFile_size,
            'type' => $currentFile_type,
            'file' => '/file-uploads/' . $currentFile_name, // url of the file
            'data' => array(
                'listProps' => array(
                    'file' => $currentFile_name
                )
            )
        );
    }
}

$fileUploadConfig = array(
    'xml'           => 'drag-and-drop',
    'upload_dir'    => '../../../../../file-uploads/', // the directory to upload the files. relative to phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php
    'limit'         => 3, // max. number of files
    'file_max_size' => 2, // each file's maximal size in MB {null, Number}
    'extensions'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'jpg'],
    'debug'         => true // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);
$form->addFileUpload('cv', '', 'Upload your CV &amp; Other Testmonials (e.g Certificates)', 'required', $fileUploadConfig, $currentFile);

$form->centerContent();

$form->addBtn('submit', 'submit-btn', 1, 'Submit CV', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#cv-submission-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 CV Submission Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create a CV Submission Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/cv-submission-form.php" />

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

    <h1 class="text-center">Php Form Builder - Bootstrap 5 CV Submission Form<br><small>with File upload and Rich Text Editor</small></h1>

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

    <!-- jQuery - required for the Fileupload plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
