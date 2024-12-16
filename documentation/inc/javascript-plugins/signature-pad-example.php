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

$form_id = 'plugins-signature-pad-form-1';

$form = new Form($form_id, 'vertical');


$form->addInput('hidden', 'user-signature', '', 'Sign to confirm your agreement', 'data-signature-pad=true, data-background-color=#336699, data-pen-color=#fff, data-width=100%, data-height=300, data-clear-button=true, data-clear-button-class=btn btn-sm btn-warning, data-clear-button-text=clear, data-fv-not-empty, data-fv-not-empty___message=You must sign to accept the license agreement');


$output['title'][]      = '';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'hidden\', \'user-signature\', \'\', \'Sign to confirm your agreement\', \'data-signature-pad=true, data-background-color=#336699, data-pen-color=#fff, data-width=100%, data-height=300, data-clear-button=true, data-clear-button-class=btn btn-sm btn-warning, data-clear-button-text=clear, data-fv-not-empty, data-fv-not-empty___message=You must sign to accept the license agreement\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
