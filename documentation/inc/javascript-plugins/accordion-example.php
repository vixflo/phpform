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

$form_id = 'plugins-accordion-form-1';
$form = new Form($form_id, 'horizontal', 'data-accordion=true');

$form->addHeading('Section 1');
$form->startFieldset();
$form->addHtml('<p class="text-muted pt-2 pb-5">// Section 1 content here ...</p>');
$form->endFieldset();

$form->addHeading('Section 2');
$form->startFieldset();
$form->addHtml('<p class="text-muted pt-2 pb-5">// Section 2 content here ...</p>');
$form->endFieldset();

$form->addHeading('Section 3');
$form->startFieldset();
$form->addHtml('<p class="text-muted pt-2 pb-5">// Section 3 content here ...</p>');
$form->endFieldset();

$output['title'][]     = '';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form->addHeading(\'Section 1\');
$form->startFieldset();
$form->addHtml(\'<p class="text-muted pt-2 pb-5">// Section 1 content here ...</p>\');
$form->endFieldset();

$form->addHeading(\'Section 2\');
$form->startFieldset();
$form->addHtml(\'<p class="text-muted pt-2 pb-5">// Section 2 content here ...</p>\');
$form->endFieldset();

$form->addHeading(\'Section 3\');
$form->startFieldset();
$form->addHtml(\'<p class="text-muted pt-2 pb-5">// Section 3 content here ...</p>\');
$form->endFieldset();');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
