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

$form_id = 'plugins-colorpicker-form-1';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-color', '', 'Pick a color:', 'data-colorpicker=true');


$output['title'][]      = 'color code inside the input field';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-color\', \'\', \'Pick a color:\', \'data-colorpicker=true\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-colorpicker-form-2';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-color-2', '', 'Pick a color:', 'data-colorpicker=true, data-interaction-hex=true, data-interaction-rgba=true, data-interaction-hsla=true, data-interaction-input=true');


$output['title'][]     = 'Colorpicker with interaction buttons to change the color format';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-color-2\', \'\', \'Pick a color:\', \'data-colorpicker=true, data-interaction-hex=true, data-interaction-rgba=true, data-interaction-hsla=true, data-interaction-input=true\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-colorpicker-form-3';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-color-3', '', 'Pick a color:', 'data-colorpicker=true, data-lock-opacity=true, data-interaction-save=false');


$output['title'][]     = 'Colorpicker with no opacity options, no save button';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-color-3\', \'\', \'Pick a color:\', \'data-colorpicker=true, data-lock-opacity=true, data-interaction-save=false\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-colorpicker-form-4';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-color-4', '', 'Pick a color:', 'data-colorpicker=true, data-theme=monolith');


$output['title'][]     = 'Colorpicker with default options and <em>monolith</em> theme';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-color-4\', \'\', \'Pick a color:\', \'data-colorpicker=true, data-theme=monolith\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
