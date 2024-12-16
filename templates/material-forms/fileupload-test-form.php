<?php
// phpcs:disable PSR1.Files.SideEffects
use fileuploader\server\FileUploader;
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once $root . '/phpformbuilder/autoload.php';

/**
 * Cleans a directory by deleting files that are older than 1 hour, except for a specific file.
 *
 * @param string $dir The directory path to clean.
 * @return void
 */
function cleanDir($dir)
{
    if ($files = glob($dir)) { // get all file names present in folder
        foreach ($files as $file) { // iterate files
            if (is_file($file) && basename($file) != 'art-creative-metal-creativity.jpg' && (time() - filectime($file) > 3600)) {
                // if file is 1 hour (3600 seconds) old then delete it
                unlink($file); // delete the file
            }
        }
    }
}

cleanDir($root . '/file-uploads/images/thumbs/lg/*');
cleanDir($root . '/file-uploads/images/thumbs/md/*');
cleanDir($root . '/file-uploads/images/thumbs/sm/*');
cleanDir($root . '/file-uploads/images/*');
cleanDir($root . '/file-uploads/*');

// copy the demo image in file-uploads if it's been deleted by some user
if ($_SERVER['SERVER_NAME'] == 'www.phpformbuilder.pro' && !file_exists($root . '/file-uploads/images/art-creative-metal-creativity.jpg')) {
    copy($root . '/assets/images/art-creative-metal-creativity.jpg', $root . '/file-uploads/images/art-creative-metal-creativity.jpg');
}

$form = new Form('fileupload-test-form', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

/* ==================================================
    Single file upload
================================================== */

$fileUploadConfig = array(
    'upload_dir'    => '../../../../../file-uploads/', // the directory to upload the files. relative to phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php
    'limit'         => 1, // max. number of files
    'file_max_size' => 2, // each file's maximal size in MB {null, Number}
    'extensions'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
    'debug'         => true // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);

$form->startFieldset('Single file upload');
$form->addHelper('Accepted File Types : .pdf, .doc[x], .xls[x], .txt', 'single-file');
$form->addFileUpload('single-file', '', 'Attach a file', '', $fileUploadConfig);
$form->endFieldset();

/* ==================================================
    Multiple files upload
================================================== */

$fileUploadConfig = array(
    'upload_dir'    => '../../../../../file-uploads/', // the directory to upload the files. relative to phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php
    'limit'         => 3, // max. number of files
    'file_max_size' => 2, // each file's maximal size in MB {null, Number}
    'extensions'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
    'debug'         => true // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);

$form->startFieldset('Multiple files upload');
$form->addHelper('3 files maximum. Accepted File Types : .pdf, .doc[x], .xls[x], .txt', 'multiple-files');
$form->addFileUpload('multiple-files', '', 'Upload your documents', '', $fileUploadConfig);
$form->endFieldset();

/* ==================================================
    Images upload
================================================== */

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

$form->startFieldset('Multiple images upload with resizing, thumbnails and image editor (crop/rotate)');
$form->addHtml('<p>The uploader resizes the uploaded image (960px * 720px), then generates large, medium &amp; small thumbnails for each uploaded image.</p>');
$form->addHelper('3 files max. Accepted File Types : .jp[e]g, .png, .gif<br>Click on the uploaded preview image to crop/rotate.', 'uploaded-images');
$form->addFileUpload('uploaded-images', '', 'Upload up to 3 images', '', $fileUploadConfig);
$form->endFieldset();

/* ==================================================
    Prefilled upload with existing image
================================================== */

$currentFile = []; // default empty

$currentFile_path = $root . '/file-uploads/images/';
$currentFile_name = 'art-creative-metal-creativity.jpg';

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
}
$fileUploadConfig = array(
    'xml'           => 'image-upload', // the thumbs directories must exist
    'uploader'      => 'ajax_upload_file.php', // the uploader file in phpformbuilder/plugins/fileuploader/[xml]/php
    'upload_dir'    => '../../../../../file-uploads/images/', // the directory to upload the files. relative to [plugins dir]/fileuploader/image-upload/php/ajax_upload_file.php
    'limit'         => 1, // max. number of files
    'file_max_size' => 2, // each file's maximal size in MB {null, Number}
    'extensions'    => ['jpg', 'jpeg', 'png'],
    'thumbnails'    => true,
    'editor'        => true,
    'width'         => 960,
    'height'        => 720,
    'crop'          => false,
    'debug'         => true
);

$form->startFieldset('Prefilled upload with existing image');
$form->addHelper('Accepted File Types : Accepted File Types : .jp[e]g, .png, .gif', 'prefilled-uploader');
$form->addFileUpload('prefilled-uploader', '', 'Your image', 'required', $fileUploadConfig, $currentFile);
$form->endFieldset();

/*=====================================
=            Drag and drop            =
=====================================*/

$fileUploadConfig = array(
    'xml'           => 'drag-and-drop',
    'upload_dir'    => '../../../../../file-uploads/', // the directory to upload the files. relative to phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php
    'limit'         => 2, // max. number of files
    'file_max_size' => 2, // each file's maximal size in MB {null, Number}
    'extensions'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
    'debug'         => true // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);

$form->startFieldset('Drag and drop');
$form->addHelper('Accepted File Types : .pdf, .doc[x], .xls[x], .txt', 'drag-and-drop');
$form->addFileUpload('drag-and-drop', '', 'Drag and drop', '', $fileUploadConfig);
$form->endFieldset();

// real time validation
$form->addPlugin('formvalidation', '#fileupload-test-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material File Upload Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a File Upload with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/fileupload-test-form.php" />

    <!-- Materialize CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material icons CSS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
    <style>
        form fieldset {
            background: #fafafa;
            padding: 0 20px;
            margin-bottom: 60px;
        }

        fieldset legend {
            padding: 10px 20px;
            margin: 0 -20px 20px;
            width: calc(100% + 40px);
            color: #fff;
            background: #3E5DC2;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - File Upload Form<br><small>Upload documents or images</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <div class="center-align">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#fileuploader" class="btn grey darken-1 waves-effect waves-light btn-small"><strong>File uploader plugin</strong> - documentation here <i class="material-icons right">arrow_right</i></a>
                    <p>&nbsp;</p>
                </div>
                <?php
                $form->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#fileupload-test-form'));
        });
    </script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        // The prefilled uploader real time validation has to be done on the "real" hidden field
        // named 'prefilled-uploader'
        // not on the 'uploader-prefilled-uploader' generated by the fileuploader plugin
        var fvCallback = function() {
            var form = forms['fileupload-test-form'];
            form.fv.addField(
                'prefilled-uploader', {
                    validators: {
                        notEmpty: {
                            message: 'file is required'
                        }
                    }
                }
            ).removeField('uploader-prefilled-uploader');
        };
    </script>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
