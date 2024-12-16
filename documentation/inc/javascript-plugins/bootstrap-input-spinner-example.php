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

$form_id = 'plugins-bootstrap-input-spinner-form-1';

$form = new Form($form_id, 'horizontal');

$form->addInput('number', 'number-input-1', 0, 'Increase / Decrease', 'data-input-spinner=true, min=0, max=20, data-buttons-clazz=btn-dark');

$output['title'][]     = 'Bootstrap Number Input Spinner';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'number\', \'number-input-1\', 0, \'Increase / Decrease\', \'data-input-spinner=true, min=0, max=20, data-buttons-clazz=btn-dark\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-bootstrap-input-spinner-form-2';

$form = new Form($form_id, 'horizontal');

$form->addInput('number', 'number-input-2', '', 'Increase / Decrease', 'data-input-spinner=true, min=0, max=9, step=0.1, data-decimals=2, data-suffix=°C');

$output['title'][]     = 'Bootstrap Number Input Spinner with decimal, custom steps and suffix';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'number\', \'number-input-2\', \'\', \'Increase / Decrease\', \'data-input-spinner=true, min=0, max=9, step=0.1, data-decimals=2, data-suffix=°C\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
