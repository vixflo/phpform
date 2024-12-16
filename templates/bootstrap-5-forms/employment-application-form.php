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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('employment-application-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('employment-application-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['employment-application-form'] = $validator->getAllErrors();
    } else {
        /* Send email with attached file(s) */

        $path = $root . '/file-uploads/images/thumbs/md/';
        $attachments = array();
        if (isset($_POST['uploaded-images']) && !empty($_POST['uploaded-images'])) {
            $images = FileUploader::getPostedFiles($_POST['uploaded-images']);
            foreach ($images as $f) {
                $attachments[] = $path . $f['file'];
            }
            $attachments = implode(', ', $attachments);
        }
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Employment Application Form',
            'attachments'     => $attachments,
            'filter_values'   => 'employment-application-form, uploaded-images'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('employment-application-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('employment-application-form', 'horizontal', 'novalidate', 'bs5');
$form->setMode('development');

$form->startFieldset('Your job', '', 'class=text-center mb-4');
$form->addOption('position-applying-for', '', '', '', 'data-placeholder=true');
$form->addOption('position-applying-for', 'Interface Designer', 'Interface Designer');
$form->addOption('position-applying-for', 'Software Engineer', 'Software Engineer');
$form->addOption('position-applying-for', 'System Administrator', 'System Administrator');
$form->addOption('position-applying-for', 'Office Manager', 'Office Manager');
$form->addSelect('position-applying-for', 'Which position are you applying for ?', 'data-slimselect=true, data-placeholder=Choose one ..., required');
$form->addRadio('relocate', 'No', 'No', 'data-color=danger,');
$form->addRadio('relocate', 'Yes', 'Yes', 'data-color=success,');
$form->printRadioGroup('relocate', 'Are you willing to relocate ?', true, 'required');
$form->addPlugin('pickadate', '#start-date');
$form->addInput('text', 'start-date', '', 'When can you start ?', 'required');
$form->addIcon('salary-requirements', '<i class="bi bi-currency-dollar" aria-hidden="true"></i>', 'after');
$form->addInput('text', 'salary-requirements', '', 'Salary Requirements', 'data-fv-integer');
$form->endFieldset();

// Portfolio
$form->startFieldset('Your Portfolio', '', 'class=text-center mb-4');

$form->addHelper('3 files max. Accepted File Types : .jp[e]g, .png, .gif<br>The uploader will generate large, medium &amp; small thumbnails for each uploaded image.<br>Click on the uploaded preview image to crop/rotate.', 'uploaded-images');

// reload the previously posted file if the form was posted with errors
$currentImages = array();
if (isset($_POST['uploaded-images']) && !empty($_POST['uploaded-images'])) {
    $postedImages = FileUploader::getPostedFiles($_POST['uploaded-images']);
    foreach ($postedImages as $f) {
        $currentFile_path = $root . '/file-uploads/images/';
        $currentFile_name = $f['file'];
        if (file_exists($currentFile_path . $currentFile_name)) {
            $currentFile_size = filesize($currentFile_path . $currentFile_name);
            $currentFile_type = mime_content_type($currentFile_path . $currentFile_name);
            $currentFile = array(
                'name' => $currentFile_name,
                'size' => $currentFile_size,
                'type' => $currentFile_type,
                'file' => '/file-uploads/images/' . $currentFile_name, // url of the file
                'data' => array(
                    'listProps' => array(
                        'file' => $currentFile_name
                    )
                )
            );
            $currentImages[] = $currentFile;
        }
    }
}

$fileUploadConfig = array(
    'xml'           => 'image-upload',                          // the uploader's config in phpformbuilder/plugins-config/fileuploader.xml
    'uploader'      => 'ajax_upload_file.php',              // the uploader file in phpformbuilder/plugins/fileuploader/[xml]/php
    'upload_dir'    => '../../../../../file-uploads/images/',   // the directory to upload the files. relative to [plugins dir]/fileuploader/image-upload/php/ajax_upload_file.php
    'limit'         => 3,                                       // max. number of files
    'file_max_size' => 2,                                       // each file's maximal size in MB {null, Number}
    'extensions'    => ['jpg', 'jpeg', 'png', 'gif'],           // allowed extensions
    'thumbnails'    => true,                                    // the thumbs directories must exist. thumbs config. is done in phpformbuilder/plugins/fileuploader/image-upload/php/ajax_upload_file.php
    'editor'        => true,                                    // allows the user to crop/rotate the uploaded image
    'width'         => 960,                                     // the uploaded image maximum width
    'height'        => 720,                                     // the uploaded image maximum height
    'crop'          => false,
    'debug'         => true                                     // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);
$form->addFileUpload('uploaded-images', '', 'Upload up to 3 images', '', $fileUploadConfig, $currentImages);

$form->addInput('text', 'portfolio-web-site', '', 'Portfolio Web Site', 'placeholder=https://, data-fv-uri, required');
$form->endFieldset();

// Contact Information
$form->startFieldset('Your Contact Information', '', 'class=text-center mb-4');
$form->setCols(3, 4);
$form->groupElements('user-first-name', 'user-last-name');
$form->addHelper('First Name', 'user-first-name');
$form->addInput('text', 'user-first-name', '', 'Your Name', 'required');
$form->setCols(0, 5);
$form->addHelper('Last Name', 'user-last-name');
$form->addInput('text', 'user-last-name', '', '', 'required');
$form->setCols(3, 9);
$form->addInput('email', 'user-email', '', 'Your E-mail', 'required');
$form->endFieldset();

$form->centerContent();
$form->addBtn('submit', 'my-btn-5', 1, 'Send <span class="bi bi-envelope-fill ms-2"></span>', 'class=btn btn-primary, data-ladda-button=true, data-style=slide-left');

// Custom radio & checkbox css
$form->addPlugin('pretty-checkbox', '#employment-application-form');

// Javascript validation
$form->addPlugin('formvalidation', '#employment-application-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Employment Application Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to create an Employment Application Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/employment-application-form.php" />

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
    <style>
        fieldset {
            margin-bottom: 40px;
            padding: 20px 15px;
            background: #f7f7f7;
        }

        legend {
            padding: 5px 10px;
            font-size: 1.1rem;
            color: #fff;
            background: #666;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Employment Application Form<br><small>with File uploader &amp; date picker</small></h1>

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

    <!-- jQuery - required for the fileuploader plugin -->

    <script src=" https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"> </script>

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