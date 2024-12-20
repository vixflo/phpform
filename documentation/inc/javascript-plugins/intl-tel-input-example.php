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

$form_id = 'plugins-intl-tel-input-form-1';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'user-phone-1', '', '', 'data-intphone=true, data-fv-intphonenumber=true, required');

// jQuery validation
$form->addPlugin('formvalidation', '#plugins-intl-tel-input-form-1');


$output['title'][]     = 'International phone with country dropdown list and live validation (<a href="class-doc.php#javascript-validation-getting-started">formvalidation plugin</a>)';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'user-phone-1\', \'\', \'\', \'data-intphone=true, data-fv-intphonenumber=true, required\');

// jQuery validation
$form->addPlugin(\'formvalidation\', \'#intl-tel-input-form-1\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-intl-tel-input-form-2';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'user-phone-2', '', 'Phone:', 'data-intphone=true, required');


$output['title'][]     = 'International phone with country dropdown list';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'user-phone-2\', \'\', \'Phone:\', \'data-intphone=true, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-intl-tel-input-form-3';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'user-phone-3', '', '', 'data-intphone=true, data-allow-dropdown=false, required');


$output['title'][]     = 'International phone with fixed single country (no dropdown list)';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'user-phone-3\', \'\', \'\', \'data-intphone=true, data-allow-dropdown=false, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-intl-tel-input-form-4';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'user-phone-4', '', '', 'data-intphone=true, data-only-countries=pt\,es\,fr\,it, required');


$output['title'][]     = 'International phone with specific country list';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'user-phone-4\', \'\', \'\', \'data-intphone=true, data-only-countries=pt\,es\,fr\,it, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
