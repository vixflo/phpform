<?php

use phpformbuilder\Form;
use Migliori\PowerLitePdo\Db;

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();

include_once $root . '/phpformbuilder/autoload.php';

if (!isset($_POST['category']) || !is_numeric($_POST['category'])) {
    echo 'wrong values posted';
    var_dump($_POST);
    exit;
}

/* =============================================
    Database connection
============================================= */

$container = require_once $root . '/phpformbuilder/vendor/migliori/power-lite-pdo/src/bootstrap.php';
$db = $container->get(Db::class);


$sql       = 'SELECT name, code FROM products WHERE productlines_id = :productlines_id';
$values    = array('productlines_id' => $_POST['category']);
$db->Query($sql, $values);
$rows = $db->fetchAll(PDO::FETCH_ASSOC);
$products  = $db->convertToSimpleArray($rows, 'name', 'code');

$form = new Form('ajax-products', 'vertical');
$form->setMode('development');
$options = array(
    'elementsWrapper' => ''
);
$form->setOptions($options);

foreach ($products as $code => $name) {
    $selected = '';
    if (isset($_SESSION['customer-support-form']['product']) && $_SESSION['customer-support-form']['product'] == $code) {
        $selected = 'selected';
    }
    $form->addOption('product', $code, $name, '', $selected);
}
$form->addSelect('product', '', 'data-slimselect=true, data-placeholder=Choose a product, required');

echo $form->html;
