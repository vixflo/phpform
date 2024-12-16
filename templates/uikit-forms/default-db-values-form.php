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
            $msg = Form::buildAlert('An error has occured', 'uikit', 'danger');
        } else {
            $msg = Form::buildAlert('Database updated successfully!', 'uikit', 'success');
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

$form = new Form('db-form', 'horizontal', 'novalidate', 'uikit');
$form->setMode('development');

$form->addInput('hidden', 'product_id');
$form->startFieldset('Update Product', 'class=uk-fieldset', 'class=uk-legend uk-margin-bottom');

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
$form->addBtn('button', 'cancel', 0, 'Cancel', 'class=uk-button uk-button-default uk-margin-medium-top', 'btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=uk-button uk-button-primary uk-margin-medium-top, data-ladda-button=true, data-style=zoom-in', 'btn-group');
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
    <title>UIkit Form - Populate form with values from database</title>
    <meta name="description" content="UIkit Form Generator - how to retrieve default fields values from database with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/uikit-forms/default-db-values-form.php" />

    <!-- UIkit CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

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
</head>

<body>

    <h1 class="uk-text-center">Php Form Builder - Form using Database values<br><small>Populate form with values from database</small></h1>

    <div class="uk-container" style="min-width:70vw;">
        <div class="uk-text-center uk-margin-large-bottom">
            <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#database-overview" class="uk-button uk-button-default uk-button-small"><strong>Database PDO Library</strong> - documentation here</a>
        </div>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        $form->render();
        ?>
    </div>

    <!-- UIkit JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>

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
