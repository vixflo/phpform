<?php

use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);

foreach ($json as $var => $val) {
    ${$var} = $val;
}

$form = new Form('fg-element', 'horizontal');

$value = isset($value) ? $value : '';
$type  = isset($type) ? $type : 'h4';
$clazz = isset($clazz) ? 'class=' . $clazz : '';

$form->addHeading($value, $type, $clazz);
echo $form->html;
