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

$form_id = 'plugins-ladda-form-1';

$form = new Form($form_id, 'vertical');


$form->centerContent();

$form->startFieldset('expand-left', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-1', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-style=expand-left');
$form->endFieldset();

$form->startFieldset('contract', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-2', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-style=contract');
$form->endFieldset();

$form->startFieldset('contract-overlay', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-3', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-style=contract-overlay');
$form->endFieldset();

$form->startFieldset('zoom-in', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-4', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-style=zoom-in');
$form->endFieldset();

$form->startFieldset('slide-left', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-5', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-style=slide-left');

$form->startFieldset('data-spinner-color=darkmagenta, data-spinner-lines=6', 'class=bg-gray-100 mb-5', 'class=small text-center py-2 mb-3 bg-gray-200');
$form->addBtn('button', 'my-btn-6', 1, 'Send <span class="bi bi-envelope ms-2"></span>', 'class=btn btn-secondary, data-ladda-button=true, data-spinner-color=darkmagenta, data-spinner-lines=6');
$form->endFieldset();


$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->centerContent();

$form->startFieldset(\'expand-left\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-1\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-style=expand-left\');
$form->endFieldset();

$form->startFieldset(\'contract\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-2\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-style=contract\');
$form->endFieldset();

$form->startFieldset(\'contract-overlay\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-3\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-style=contract-overlay\');
$form->endFieldset();

$form->startFieldset(\'zoom-in\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-4\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-style=zoom-in\');
$form->endFieldset();

$form->startFieldset(\'slide-left\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-5\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-style=slide-left\');

$form->startFieldset(\'data-spinner-color=darkmagenta, data-spinner-lines=6\', \'class=bg-gray-100 mb-5\', \'class=small text-center py-2 mb-3 bg-gray-200\');
$form->addBtn(\'button\', \'my-btn-6\', 1, \'Send <span class="bi bi-envelope ms-2"></span>\', \'class=btn btn-secondary, data-ladda-button=true, data-spinner-color=darkmagenta, data-spinner-lines=6\');
$form->endFieldset();');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
