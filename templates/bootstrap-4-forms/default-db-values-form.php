<?php
// We use the "classicmodels" database as a MySQL sample database.
// Download the SQL at https://www.phpformbuilder.pro/documentation/phpformbuildersampledatabase.sql.zip
// Original source: https://www.mysqltutorial.org/mysql-sample-database.aspx

// Setup your connection in phpformbuilder/vendor/migliori/power-lite-pdo/src/connection.php

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('db-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('db-form');

    // Additional validation
    $validator->integer()->validate('product_id');
    $authorized = '`^[a-zA-Z0-9\s_,.;:!&*%$+\(\)-]+$`';
    $validator->hasPattern($authorized, 'Special characters are not accepted.')->validate('code');
    $validator->hasPattern($authorized, 'Special characters are not accepted.')->validate('name');
    $validator->hasPattern($authorized, 'Special characters are not accepted.')->validate('description');
    $validator->integer()->validate('stock');
    $validator->float()->validate('price');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['db-form'] = $validator->getAllErrors();
    } else {
        // Update the record
        $update = [
            'productlines_id'  => $_POST['productlines_id'],
            'code'             => $_POST['code'],
            'name'             => $_POST['name'],
            'description'      => $_POST['description'],
            'stock'            => $_POST['stock'],
            'price'            => $_POST['price']
        ];
        $where = [
            'id' => $_POST['product_id']
        ];

        if ($_SERVER['HTTP_HOST'] != 'www.phpformbuilder.pro' && !$db->update('products', $update, $where)) {
            $msg = Form::buildAlert('An error has occured', 'bs4', 'danger');
        } else {
            $msg = Form::buildAlert('Database updated successfully!', 'bs4', 'success');
        }
    }
}

/*==========================================================
  If no error is posted, we get the values from the database
===========================================================*/

if (!isset($_SESSION['errors']['db-form']) || empty($_SESSION['errors']['db-form'])) {
    if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
        $productId = $_GET['product_id'];
    } else {
        // we set a random $productId for the demo
        $productId = rand(331, 440);
    }

    // we register the product_id to update the record later
    $_SESSION['db-form']['product_id'] = $productId;

    $row = $db->selectRow('products', 'productlines_id, products.code, products.name, products.description, products.stock, products.price', ['products.id' => $productId]);

    // we register the record values to populate the form values
    $_SESSION['db-form']['productlines_id']  = $row->productlines_id;
    $_SESSION['db-form']['code']             = $row->code;
    $_SESSION['db-form']['name']             = $row->name;
    $_SESSION['db-form']['description']      = $row->description;
    $_SESSION['db-form']['stock']            = $row->stock;
    $_SESSION['db-form']['price']            = $row->price;
}

$form = new Form('db-form', 'horizontal', 'novalidate', 'bs4');
$form->setMode('development');

$form->addInput('hidden', 'product_id');
$form->startFieldset('Update Product', '', 'class=text-center mb-4');

// get the product lines to populate the select options
$columns = array('id', 'name');
$db->select('productlines', $columns);

// loop through the results
while ($row = $db->fetch()) {
    $form->addOption('productlines_id', $row->id, $row->name);
}
$form->addSelect('productlines_id', 'Product line', 'data-slimselect=true, required');

$form->addInput('text', 'code', '', 'Code', 'required');
$form->addInput('text', 'name', '', 'Name', 'required');
$form->addInput('text', 'description', '', 'Description', 'required');
$form->addInput('number', 'stock', '', 'Stock', 'required');
$form->addAddon('price', '&euro;', 'after');
$form->addInput('number', 'price', '', 'Price', 'required');
$form->setCols(0, 12);
$form->centerContent();
$form->addBtn('button', 'cancel', 0, 'Cancel', 'class=btn btn-warning mt-5', 'btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary mt-5, data-ladda-button=true, data-style=zoom-in', 'btn-group');
$form->printBtnGroup('btn-group');
$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#db-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Form - Populate form with values from database</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to retrieve default fields values from database with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/default-db-values-form.php" />

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
    <h1 class="text-center">Php Form Builder - Form using Database values<br><small>Populate form with values from database</small></h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#database-overview" class="btn btn-secondary btn-sm"><strong>Database PDO Library</strong> - documentation here</a>
                </div>
                <?php
                if (isset($msg)) {
                    echo $msg;
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
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
