<?php
use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);

foreach ($json as $var => $val) {
    ${$var} = $val;
}

$form = new Form('fg-element', 'horizontal');

$clazz = isset($clazz) ? $clazz : '';
$value = isset($value) ? $value : '';

$form->addHtml('<p class="' . $clazz . '">' . $value . '</p>');
echo $form->html;
