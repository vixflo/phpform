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

$form_id = 'plugins-tooltip-form-1';

$form = new Form($form_id, 'vertical');

$form->addInput('text', 'input-a', '', 'Default tooltip', 'required, data-tooltip=I\'m a default tooltip');
$form->addInput('text', 'input-z', '', 'Tooltip with animation', 'required, data-tooltip=I\'m a default tooltip with a perspective animation, data-animation=perspective');
$form->addInput('text', 'input-e', '', 'Delayed Tooltip', 'required, data-tooltip=I appear after a delay of 2000 milliseconds, data-delay=2000');
$form->addInput('text', 'input-r', '', 'Positioned tooltip', 'required, data-tooltip=I\'m positionned on the left start, data-placement=left-start');
$form->addInput('text', 'input-t', '', 'Light theme', 'required, data-tooltip=Light theme, data-theme=light');
$form->addInput('text', 'input-t', '', 'Light Border theme', 'required, data-tooltip=Light Border theme, data-theme=light-border');
$form->addInput('text', 'input-t', '', 'Material theme', 'required, data-tooltip=Material theme, data-theme=material');
$form->addInput('text', 'input-t', '', 'Translucent theme', 'required, data-tooltip=Translucent theme, data-theme=translucent');
$form->addInput('text', 'input-u', '', 'Tooltip on click', 'required, data-tooltip=Click to show / hide, data-trigger=click');

$form->addPlugin('tooltip', '[data-tooltip]');


$output['title'][]      = '';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form->addInput(\'text\', \'input-a\', \'\', \'Default tooltip\', \'required, data-tooltip=I\\\'m a default tooltip\');
$form->addInput(\'text\', \'input-z\', \'\', \'Tooltip with animation\', \'required, data-tooltip=I\\\'m a default tooltip with a perspective animation, data-animation=perspective\');
$form->addInput(\'text\', \'input-e\', \'\', \'Delayed Tooltip\', \'required, data-tooltip=I appear after a delay of 2000 milliseconds, data-delay=2000\');
$form->addInput(\'text\', \'input-r\', \'\', \'Positioned tooltip\', \'required, data-tooltip=I\\\'m positionned on the left start, data-placement=left-start\');
$form->addInput(\'text\', \'input-t\', \'\', \'Light theme\', \'required, data-tooltip=Light theme, data-theme=light\');
$form->addInput(\'text\', \'input-t\', \'\', \'Light Border theme\', \'required, data-tooltip=Light Border theme, data-theme=light-border\');
$form->addInput(\'text\', \'input-t\', \'\', \'Material theme\', \'required, data-tooltip=Material theme, data-theme=material\');
$form->addInput(\'text\', \'input-t\', \'\', \'Translucent theme\', \'required, data-tooltip=Translucent theme, data-theme=translucent\');
$form->addInput(\'text\', \'input-u\', \'\', \'Tooltip on click\', \'required, data-tooltip=Click to show / hide, data-trigger=click\');

$form->addPlugin(\'tooltip\', \'[data-tooltip]\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-tooltip-form-2';

$form = new Form($form_id, 'vertical');

// create a HTML template with the tooltip HTML content inside
$form->addHtml('<template id="tooltip-html-content"><h5 class="px-3 py-2 bg-warning">Tooltip title</h5><p>You can add any HTML content here</p></template>');
$form->addInput('text', 'input-u', '', 'Tooltip with HTML content', 'required, data-tooltip=true, data-content-src=#tooltip-html-content, data-allow-html=true');

$form->addPlugin('tooltip', '[data-tooltip]');


$output['title'][]     = 'Tooltip with HTML content';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

// create a HTML template with the tooltip HTML content inside
$form->addHtml(\'<template id="tooltip-html-content"><h5 class="px-3 py-2 bg-warning">Tooltip title</h5><p>You can add any HTML content here</p></template>\');
$form->addInput(\'text\', \'input-u\', \'\', \'Tooltip with HTML content\', \'required, data-tooltip=true, data-content-src=#tooltip-html-content, data-allow-html=true\');

$form->addPlugin(\'tooltip\', \'[data-tooltip]\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
