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

$form_id = 'plugins-altcha-form-1';
$form = new Form($form_id, 'horizontal');

$form->addAltcha();

$output['title'][]     = '';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars(
'$form->addAltcha();

// or with SPAM Filter enabled:
$form->addAltcha(true);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
