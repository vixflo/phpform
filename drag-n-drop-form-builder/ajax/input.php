<?php

use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);
foreach ($json as $var => $val) {
    ${$var} = $val;
}

$form = new Form('fg-element', 'horizontal');

$label = isset($label) ? $label : '';
$name  = isset($name) ? $name : '';
$type  = isset($type) ? $type : 'text';
$value = isset($value) ? $value : '';
$attr  = isset($attr) ? $attr : '';

if (isset($helper) && !empty($helper)) {
    $form->addHelper($helper, $name);
}
if (empty($label)) {
    $form->setCols(0, 12);
}
if (isset($icon) && !empty($icon)) {
    $icon_html = '<i class="' . $icon . '" aria-label="hidden"></i>';
    if (strpos($icon, 'material') > -1) {
        $ic = explode(' ', $icon);
        $icon_class = $ic[0];
        $icon_text = $ic[1];
        $icon_html = '<i class="' . $icon_class . '" aria-label="hidden">' . $icon_text . '</i>';
    }
    $iconPosition = isset($iconPosition) ? $iconPosition : 'before';
    $form->addIcon($name, $icon_html, $iconPosition);
}

$form->addInput($type, $name, $value, $label, $attr);

echo $form->html;
