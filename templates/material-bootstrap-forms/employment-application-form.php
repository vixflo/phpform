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

$form = new Form('employment-application-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#employment-application-form');


$form->startFieldset('Your job');
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
$form->addIcon('salary-requirements', '<i class="fas fa-dollar-sign" aria-hidden="true"></i>', 'after');
$form->addInput('text', 'salary-requirements', '', 'Salary Requirements', 'data-fv-integer');
$form->endFieldset();

// Portfolio
$form->startFieldset('Your Portfolio');

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
$form->startFieldset('Your Contact Information');
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
$form->addBtn('submit', 'my-btn-5', 1, 'Send <span class="fas fa-envelope ml-2"></span>', 'class=btn btn-primary waves-effect waves-light, data-ladda-button=true, data-style=slide-left');

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
    <title>Material Bootstrap Employment Application Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create an Employment Application Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/employment-application-form.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
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
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

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

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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