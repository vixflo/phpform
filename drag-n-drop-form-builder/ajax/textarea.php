<?php
use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);
foreach ($json as $var => $val) {
    ${$var} = $val;
}

$attr   = isset($attr) ? $attr : '';
$label  = isset($label) ? $label : '';
$name   = isset($name) ? $name : '';
$value  = isset($value) ? $value : '';

$form = new Form('fg-element', 'horizontal');
if (isset($helper) && !empty($helper)) {
    $form->addHelper($helper, $name);
}

if (empty($label)) {
    $form->setCols(0, 12);
}

$form->addTextarea($name, $value, $label, $attr);

echo $form->html;
