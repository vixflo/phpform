<?php

use phpformbuilder\Form;

include_once '../../../phpformbuilder/autoload.php';
include_once 'render.php';

$output = array(
    'form_code'   => array(),
    'form'        => array(),
    'html_code'   => array()
);

$form_id = 'plugins-material-form-1';

$form = new Form($form_id, 'horizontal', 'novalidate', 'material');


$form->addPlugin('materialize', '#' . $form_id);

$form->groupElements('user-name-material', 'user-email-material');
$form->setCols(0, 6);
$form->addIcon('user-name-material', '<i class="bi bi-person-fill" style="font-size:1.75rem;" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-name-material', '', 'Name', 'required');
$form->addIcon('user-email-material', '<i class="bi bi-envelope" style="font-size:1.75rem;" aria-hidden="true"></i>', 'before');
$form->addInput('text', 'user-email-material', '', 'Email');


$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\', \'novalidate\', \'material\');
$form->addPlugin(\'materialize\', \'#' . $form_id . '\');

$form->groupElements(\'user-name\', \'user-email\');
$form->setCols(0, 6);
$form->addIcon(\'user-name\', \'<i class="bi bi-person-fill" style="font-size:1.75rem;" aria-hidden="true"></i>\', \'before\');
$form->addInput(\'text\', \'user-name\', \'\', \'Name\', \'required\');
$form->addIcon(\'user-email\', \'<i class="bi bi-envelope" style="font-size:1.75rem;" aria-hidden="true"></i>\', \'before\');
$form->addInput(\'text\', \'user-email\', \'\', \'Email\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
