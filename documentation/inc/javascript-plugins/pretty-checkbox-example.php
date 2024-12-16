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

$form_id = 'plugins-pretty-checkbox-form-1';

$form = new Form($form_id, 'horizontal');

$form->addCheckbox('chk-group-1', 'choice one', 'value 1');
$form->addCheckbox('chk-group-1', 'choice two', 'value 2', 'checked=checked');
$form->addCheckbox('chk-group-1', 'choice three', 'value 3', 'checked=checked');
$form->printCheckboxGroup('chk-group-1', 'Check please: ', true, 'required');

$form->addRadio('radio-group-1', 'choice one', 'value 1');
$form->addRadio('radio-group-1', 'choice two', 'value 2', 'checked=checked');
$form->addRadio('radio-group-1', 'choice three', 'value 3');
$form->printRadioGroup('radio-group-1', 'Choose one please', true, 'required');

$form->addPlugin('pretty-checkbox', '#' . $form_id);

$output['title'][]      = 'pretty chechboxes & radio buttons with default settings';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'chk-group-1\', \'choice one\', \'value 1\');
$form->addCheckbox(\'chk-group-1\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addCheckbox(\'chk-group-1\', \'choice three\', \'value 3\', \'checked=checked\');
$form->printCheckboxGroup(\'chk-group-1\', \'Check please: \', true, \'required\');

$form->addRadio(\'radio-group-1\', \'choice one\', \'value 1\');
$form->addRadio(\'radio-group-1\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addRadio(\'radio-group-1\', \'choice three\', \'value 3\');
$form->printRadioGroup(\'radio-group-1\', \'Choose one please\', true, \'required\');

$form->addPlugin(\'pretty-checkbox\', \'#' . $form_id . '\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-pretty-checkbox-form-2';

$form = new Form($form_id, 'horizontal');

$form->addCheckbox('chk-group-2', 'choice one', 'value 1');
$form->addCheckbox('chk-group-2', 'choice two', 'value 2', 'checked=checked');
$form->addCheckbox('chk-group-2', 'choice three', 'value 3', 'checked=checked');
$form->printCheckboxGroup('chk-group-2', 'Check please: ', true, 'required');

$form->addRadio('radio-group-2', 'choice one', 'value 1');
$form->addRadio('radio-group-2', 'choice two', 'value 2', 'checked=checked');
$form->addRadio('radio-group-2', 'choice three', 'value 3');
$form->printRadioGroup('radio-group-2', 'Choose one please', true, 'required');

$options = [
    'checkboxStyle' => 'curve',
    'color'         => 'info',
    'fill'          => 'fill',
    'size'          => 'bigger'
];
$form->addPlugin('pretty-checkbox', '#' . $form_id, 'default', $options);

$output['title'][]      = 'Custom style, color, filled &amp; bigger size';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'chk-group-2\', \'choice one\', \'value 1\');
$form->addCheckbox(\'chk-group-2\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addCheckbox(\'chk-group-2\', \'choice three\', \'value 3\', \'checked=checked\');
$form->printCheckboxGroup(\'chk-group-2\', \'Check please: \', true, \'required\');

$form->addRadio(\'radio-group-2\', \'choice one\', \'value 1\');
$form->addRadio(\'radio-group-2\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addRadio(\'radio-group-2\', \'choice three\', \'value 3\');
$form->printRadioGroup(\'radio-group-2\', \'Choose one please\', true, \'required\');

$options = [
    \'checkboxStyle\' => \'curve\',
    \'color\'         => \'info\',
    \'fill\'          => \'fill\',
    \'size\'          => \'bigger\'
];
$form->addPlugin(\'pretty-checkbox\', \'#' . $form_id . '\', \'default\', $options);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-pretty-checkbox-form-3';

$form = new Form($form_id, 'horizontal');

$form->addCheckbox('chk-group-3', 'choice one', 'value 1');
$form->addCheckbox('chk-group-3', 'choice two', 'value 2', 'checked=checked');
$form->addCheckbox('chk-group-3', 'choice three', 'value 3', 'checked=checked');
$form->printCheckboxGroup('chk-group-3', 'Check please: ', true, 'required');

$form->addRadio('radio-group-3', 'choice one', 'value 1');
$form->addRadio('radio-group-3', 'choice two', 'value 2', 'checked=checked');
$form->addRadio('radio-group-3', 'choice three', 'value 3');
$form->printRadioGroup('radio-group-3', 'Choose one please', true, 'required');

$options = [
    'icon'        => 'bi bi-check-lg',
    'plain'       => 'plain',
    'animations'  => 'smooth'
];
$form->addPlugin('pretty-checkbox', '#' . $form_id, 'default', $options);

$output['title'][]      = 'Check icons, no borders &amp; smooth animations';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'chk-group-3\', \'choice one\', \'value 1\');
$form->addCheckbox(\'chk-group-3\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addCheckbox(\'chk-group-3\', \'choice three\', \'value 3\', \'checked=checked\');
$form->printCheckboxGroup(\'chk-group-3\', \'Check please: \', true, \'required\');

$form->addRadio(\'radio-group-3\', \'choice one\', \'value 1\');
$form->addRadio(\'radio-group-3\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addRadio(\'radio-group-3\', \'choice three\', \'value 3\');
$form->printRadioGroup(\'radio-group-3\', \'Choose one please\', true, \'required\');

$options = [
    \'icon\'        => \'bi bi-check-lg\',
    \'plain\'       => \'plain\',
    \'animations\'  => \'smooth\'
];
$form->addPlugin(\'pretty-checkbox\', \'#' . $form_id . '\', \'default\', $options);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-pretty-checkbox-form-4';

$form = new Form($form_id, 'horizontal');

$form->addCheckbox('chk-group-4', '', 'value 1', 'data-toggle=true, data-on-label=On, data-off-label=Off, data-on-icon=bi bi-bell-fill pe-4, data-off-icon=bi bi-bell-slash-fill pe-4, data-on-color=danger-o, data-plain=plain, data-size=bigger, checked');
$form->addCheckbox('chk-group-4', '', 'value 2', 'data-toggle=true, data-on-label=Playing, data-off-label=Paused, data-on-icon=bi bi-play-circle pe-4, data-off-icon=bi bi-pause-circle pe-4, data-on-color=primary-o, data-plain=plain, data-size=bigger');
$form->addCheckbox('chk-group-4', '', 'value 3', 'data-toggle=true, data-on-label=Preview On, data-off-label=Preview Off, data-on-icon=bi bi-eye-fill pe-4, data-off-icon=bi bi-eye-slash-fill pe-4, data-on-color=info-o, data-plain=plain, data-size=bigger');
$form->printCheckboxGroup('chk-group-4', 'Toggle checkboxes: ', true);

$form->addRadio('radio-group-4', 'choice one', 'value 1');
$form->addRadio('radio-group-4', 'choice two', 'value 2', 'checked=checked');
$form->addRadio('radio-group-4', 'choice three', 'value 3');
$form->printRadioGroup('radio-group-4', 'Choose one please', true, 'required');

$options = [
    'icon'        => 'bi bi-check-lg',
    'plain'       => 'plain',
    'animations'  => 'smooth'
];
$form->addPlugin('pretty-checkbox', '#' . $form_id, 'default', $options);

$output['title'][]      = 'Toggle elements with On / Off states';
$output['subtitle'][]   = 'The checkboxes are configured individually with data-attributes on each one, whereas the radio buttons use the main plugin settings.';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCheckbox(\'chk-group-4\', \'\', \'value 1\', \'data-toggle=true, data-on-label=On, data-off-label=Off, data-on-icon=bi bi-bell-fill, data-off-icon=bi bi-bell-slash-fill, data-on-color=danger-o, data-plain=plain, data-size=bigger\');
$form->addCheckbox(\'chk-group-4\', \'\', \'value 2\', \'data-toggle=true, data-on-label=Playing, data-off-label=Paused, data-on-icon=bi bi-play-circle, data-off-icon=bi bi-pause-circle, data-on-color=primary-o, data-plain=plain, data-size=bigger\');
$form->addCheckbox(\'chk-group-4\', \'\', \'value 3\', \'data-toggle=true, data-on-label=Preview On, data-off-label=Preview Off, data-on-icon=bi bi-eye-fill, data-off-icon=bi bi-eye-slash-fill, data-on-color=info-o, data-plain=plain, data-size=bigger\');
$form->printCheckboxGroup(\'chk-group-4\', \'Toggle checkboxes: \', true);

$form->addRadio(\'radio-group-4\', \'choice one\', \'value 1\');
$form->addRadio(\'radio-group-4\', \'choice two\', \'value 2\', \'checked=checked\');
$form->addRadio(\'radio-group-4\', \'choice three\', \'value 3\');
$form->printRadioGroup(\'radio-group-4\', \'Choose one please\', true, \'required\');

$options = [
    \'icon\'        => \'bi bi-check-lg\',
    \'plain\'       => \'plain\',
    \'animations\'  => \'smooth\'
];
$form->addPlugin(\'pretty-checkbox\', \'#' . $form_id . '\', \'default\', $options);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
