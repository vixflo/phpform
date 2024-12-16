<?php

use phpformbuilder\Form;

include_once '../../../phpformbuilder/autoload.php';
include_once 'render.php';

$output = array(
    'title'       => array(),
    'subtitle'    => array(),
    'form_code'   => array(),
    'form'        => array(),
    'html_code'   => array()
);

$form_id = 'plugins-floating-labels-form-1';

$form = new Form($form_id);

$form->addInput('text', 'floating-labels-input-1', '', '', 'placeholder=Enter your name, required');
$form->addInput('text', 'floating-labels-input-2', 'default value', '', 'placeholder=Enter something, required');
$form->addTextarea('name', '', '', 'placeholder=Your message, required');
$form->addBtn('reset', 'floating-labels-reset-btn,', 1, 'Reset', 'class=btn btn-warning');


$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'text\', \'floating-labels-input-1\', \'\', \'\', \'placeholder=Enter your name, required\');
$form->addInput(\'text\', \'floating-labels-input-2\', \'default value\', \'\', \'placeholder=Enter something, required\');
$form->addTextarea(\'name\', \'\', \'\', \'placeholder=Your message, required\');
$form->addBtn(\'reset\', \'floating-labels-reset-btn,\', 1, \'Reset\', \'class=btn btn-warning\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
