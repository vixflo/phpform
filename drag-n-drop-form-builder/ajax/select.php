<?php
use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);

foreach ($json as $var => $val) {
    ${$var} = $val;
}

$form = new Form('fg-element', 'horizontal');

$name = isset($name) ? $name : '';
$label = isset($label) ? $label : '';
$attr = isset($attr) ? $attr : '';
$value = isset($value) ? $value : '';
$selectOptions = isset($selectOptions) ? $selectOptions : array();

if (isset($helper) && !empty($helper)) {
    $form->addHelper($helper, $name);
}

if (empty($label)) {
    $form->setCols(0, 12);
}

if (isset($placeholder) && !empty($placeholder)) {
    $form->addOption($name, '', $placeholder, '', 'disabled, selected');
}

foreach ($selectOptions as $opt) {
    $selected = '';
    if ($opt->value === $value) {
        $selected = 'selected';
    }
    $form->addOption($name, $opt->value, $opt->text, $opt->groupname, $selected);
}

$form->addSelect($name, $label, $attr);

echo $form->html;
