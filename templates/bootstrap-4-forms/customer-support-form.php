<?php
// We use the "classicmodels" database as a MySQL sample database.
// Download the SQL at https://www.phpformbuilder.pro/documentation/phpformbuildersampledatabase.sql.zip
// Original source: https://www.mysqltutorial.org/mysql-sample-database.aspx

// Setup your connection in phpformbuilder/vendor/migliori/power-lite-pdo/src/connection.php

use fileuploader\server\FileUploader;
use phpformbuilder\Form;
use Migliori\PowerLitePdo\Db;

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();

include_once $root . '/phpformbuilder/autoload.php';

/* =============================================
    Database connection
============================================= */

$container = require_once $root . '/phpformbuilder/vendor/migliori/power-lite-pdo/src/bootstrap.php';
$db = $container->get(Db::class);

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('customer-support-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('customer-support-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['customer-support-form'] = $validator->getAllErrors();
    } else {
        /* Send email with attached file(s) */

        $path = $root . '/file-uploads/';
        $attachments = '';
        if (isset($_POST['attachment']) && !empty($_POST['attachment'])) {
            $postedFile = FileUploader::getPostedFiles($_POST['attachment']);
            $attachments = $path . $postedFile[0]['file'];
        }
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Customer Support Form',
            'attachments'     =>  $attachments,
            'filter_values'   => 'customer-support-form, attachment'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('customer-support-form');
    }
}


/* =============================================
    Select the products categories
============================================= */

$columns     = array('id', 'name');
$where       = [];
$extra       = array('orderBy' => 'name');
$db->select('productlines', $columns, $where, $extra);
$rows = $db->fetchAll(PDO::FETCH_ASSOC);
$categories  = $db->convertToSimpleArray($rows, 'name', 'id');

/* ==================================================
    The Form
================================================== */

$form = new Form('customer-support-form', 'horizontal', 'novalidate', 'bs4');
$form->setMode('development');
$form->startFieldset('Please fill the form below', '', 'class=text-center mb-4');
$form->setCols(4, -1);
$form->groupElements('first-name', 'last-name');
$form->addHelper('First name', 'first-name');
$form->addInput('text', 'first-name', '', 'Full Name: ', 'required');
$form->addHelper('Last name', 'last-name');
$form->addInput('text', 'last-name', '', '', 'required');
$form->addInput('email', 'user-email', '', 'E-Mail: ', 'required');
$form->setCols(4, 8);
$form->addRadio('department', 'Technical', 'Technical');
$form->addRadio('department', 'Sales', 'Sales');
$form->addRadio('department', 'Billing', 'Billing');
$form->addRadio('department', 'Feedback', 'Feedback');
$form->printRadiogroup('department', 'Department', true, 'required');
$form->addRadio('urgency', 'Low', 'Low');
$form->addRadio('urgency', 'Medium', 'Medium');
$form->addRadio('urgency', 'High', 'High');
$form->printRadiogroup('urgency', 'Urgency', true, 'required');
$form->setCols(4, 8);

// empty option for slimselect placeholder
$form->addOption('category', '', '', '', 'data-placeholder=true');

foreach ($categories as $id => $name) {
    $form->addOption('category', $id, $name);
}
$form->addSelect('category', 'Category', 'data-slimselect=true, data-placeholder=Choose a category, data-show-search=false, required');
$form->addSelect('product', 'Product', 'data-slimselect=true, data-placeholder=Choose a category first, disabled, required');
$form->addTextarea('message', '', 'Please describe your problem', 'rows=7, required');
$form->addHelper('Accepted File Types : .pdf, .doc[x], .xls[x], .txt', 'attachment');

// reload the previously posted file if the form was posted with errors
$currentFile = [];
if (isset($_POST['attachment']) && !empty($_POST['attachment'])) {
    $postedFile = FileUploader::getPostedFiles($_POST['attachment']);
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
    'upload_dir'    => '../../../../../file-uploads/', // the directory to upload the files. relative to phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php
    'limit'         => 1, // max. number of files
    'file_max_size' => 5, // each file's maximal size in MB {null, Number}
    'extensions'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
    'debug'         => true // log the result in the browser's console and shows an error text on the page if the uploader fails to parse the json result.
);
$form->addFileUpload('attachment', '', 'Attach a file', '', $fileUploadConfig, $currentFile);
$form->setCols(0, 12);
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

// Custom radio & checkbox css
$form->addPlugin('icheck', 'input[name=\"department\"]', 'default', ['theme' => 'square', 'color' => 'red']);
$form->addPlugin('icheck', 'input[name=\"urgency\"]', 'line', ['color' => 'red']);

// Javascript validation
$form->addPlugin('formvalidation', '#customer-support-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Customer Support Form - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create a Customer Support Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/customer-support-form.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>
    <h1 class="text-center">Php Form Builder - Bootstrap Customer Support</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#database-overview" class="btn btn-secondary btn-sm"><strong>Database PDO Library</strong> - documentation here</a>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
            var $selectTarget = document.querySelector('select[name="product"]');
            document.querySelector('select[name="category"]').addEventListener('change', function(e) {
                e.preventDefault();
                fetch('customer-support-form/ajax-products.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        'category': e.target.value
                    }).toString(),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
                    },
                    cache: 'no-store',
                    credentials: 'include'
                }).then(function(response) {
                    return response.text()
                }).then(function(data) {
                    $selectTarget.innerHTML = data;
                    // enable slimselect & update options
                    slimSelects['product'].enable();
                    $selectTarget.dispatchEvent(new Event('change'));
                }).catch(function(error) {
                    console.log(error);
                });
            });
        });
    </script>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>