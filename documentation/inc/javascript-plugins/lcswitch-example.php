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

$form_id = 'plugins-lcswitch-form-1';

$form = new Form($form_id, 'horizontal');


$form->addCheckbox('my-checkbox-group', 'Checkbox 1', 'value-1');
$form->addCheckbox('my-checkbox-group', 'Checkbox 2', 'value-2', 'checked');
$form->printCheckboxGroup('my-checkbox-group', '', false, 'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncolor=#8058A5');

$form->addRadio('my-radio-group', 'Radio 1', 'value-1');
$form->addRadio('my-radio-group', 'Radio 2', 'value-2', 'checked');
$form->printRadioGroup('my-radio-group', 'Main label:', false, 'data-lcswitch=true, data-ontext=True, data-offtext=False, data-oncss=bg-info');

$output['title'][]     = 'LCSwitch plugin globally enabled';
$output['subtitle'][]  = 'All the checkboxes / radio buttons share the same texts and colors';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'my-checkbox-group\', \'Checkbox 1\', \'value-1\');
$form->addCheckbox(\'my-checkbox-group\', \'Checkbox 2\', \'value-2\', \'checked\');
$form->printCheckboxGroup(\'my-checkbox-group\', \'\', false, \'data-lcswitch=true, data-ontext=Yes, data-offtext=No, data-oncolor=#8058A5\');

$form->addRadio(\'my-radio-group\', \'Radio 1\', \'value-1\');
$form->addRadio(\'my-radio-group\', \'Radio 2\', \'value-2\', \'checked\');
$form->printRadioGroup(\'my-radio-group\', \'Main label:\', false, \'data-lcswitch=true, data-ontext=True, data-offtext=False, data-oncss=bg-info\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-lcswitch-form-2';

$form = new Form($form_id, 'horizontal');


$form->addCheckbox('my-checkbox-group-2', 'Checkbox 1', 'value-1', 'data-ontext=A, data-offtext=B, data-oncolor=#44DBD1, checked');
$form->addCheckbox('my-checkbox-group-2', 'Checkbox 2 with a nice gradient', 'value-2', 'data-ontext=Y, data-offtext=N, data-oncolor=linear-gradient(140deg\, #fabe1c 35%\, #f88c21), checked');
$form->printCheckboxGroup('my-checkbox-group-2', '', false, 'data-lcswitch=true');

$form->addRadio('my-radio-group-2', 'Radio 1', 'value-1', 'data-ontext=C, data-offtext=D, data-oncss=bg-primary');
$form->addRadio('my-radio-group-2', 'Radio 2', 'value-2', 'data-ontext=1, data-offtext=0, data-oncss=bg-dark, checked');
$form->printRadioGroup('my-radio-group-2', 'Main label:', false, 'data-lcswitch=true');

$output['title'][]     = 'LCSwitch plugin individually enabled';
$output['subtitle'][]  = 'Choose your on/off texts and colors individually for each checkbox / radio button';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'my-checkbox-group-2\', \'Checkbox 1\', \'value-1\', \'data-ontext=A, data-offtext=B, data-oncolor=#44DBD1, checked\');
$form->addCheckbox(\'my-checkbox-group-2\', \'Checkbox 2 with gradient\', \'value-2\', \'data-ontext=Y, data-offtext=N, data-oncolor=linear-gradient(140deg\\, #fabe1c 35%\\, #f88c21), checked\');
$form->printCheckboxGroup(\'my-checkbox-group-2\', \'\', false, \'data-lcswitch=true\');

$form->addRadio(\'my-radio-group-2\', \'Radio 1\', \'value-1\', \'data-ontext=C, data-offtext=D, data-oncss=bg-primary\');
$form->addRadio(\'my-radio-group-2\', \'Radio 2\', \'value-2\', \'data-ontext=1, data-offtext=0, data-oncss=bg-dark, checked\');
$form->printRadioGroup(\'my-radio-group-2\', \'Main label:\', false, \'data-lcswitch=true\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
