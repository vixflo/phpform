<?php

use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);

foreach ($json as $var => $val) {
    ${$var} = $val;
}

$form = new Form('fg-element', 'horizontal');

$label  = isset($label) ? $label : '';
$attr   = isset($attr) ? $attr : '';
$name   = isset($name) ? $name : '';
$type   = isset($type) ? $type : 'button';
$value  = isset($value) ? $value : '';

if (!empty($icon)) {
    $icon_html = '<i class="' . $icon . '" aria-label="hidden"></i>';
    if (strpos($icon, 'material') > -1) {
        $ic = explode(' ', $icon);
        $icon_class = $ic[0];
        $icon_text = $ic[1];
        $icon_html = '<i class="' . $icon_class . '" aria-label="hidden">' . $icon_text . '</i>';
    }
    if (isset($iconPosition) && $iconPosition === 'before') {
        $label = $icon_html . ' ' . $label;
    } else {
        $label .= ' ' . $icon_html;
    }
}
if (isset($center) && $center === 'true') {
    $form->centerContent();
}
$form->addBtn($type, $name, $value, $label, $attr);
echo $form->html;
