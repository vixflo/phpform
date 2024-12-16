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

$form_id = 'plugins-material-datepicker-form-1';

$form = new Form($form_id, 'horizontal');

$form->addInput('text', 'm-date', '', 'Date: ', 'required');

$form->addPlugin('material-datepicker', '#m-date');


$output['title'][]     = 'Simple date picker';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'m-date\', \'\', \'Date: \', \'required\');

$form->addPlugin(\'material-datepicker\', \'#m-date\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-material-datepicker-form-2';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'm-date-2', '', 'Date: ', 'data-default-date=2021\, 11\, 19, data-set-default-date=true, data-min-date=2021\, 01\, 01, data-max-date=2023\, 12\, 31, required');

$form->addPlugin('material-datepicker', '#m-date-2');


$output['title'][]     = 'Default date selected, date and year ranges';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form = new Form($form_id, \'horizontal\');


$form->addInput(\'text\', \'m-date-2\', \'\', \'Date: \', \'data-default-date=2021\, 11\, 19, data-set-default-date=true, data-min-date=2021\, 01\, 01, data-max-date=2023\, 12\, 31, required\');

$form->addPlugin(\'material-datepicker\', \'#m-date-2\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-material-datepicker-form-3';

/*$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'm-date-3', '', 'Date: ', 'required');
$form->addPlugin('material-datepicker', '#m-date-3', 'default', array('language' => 'fr_FR'));
*/

$output['title'][]     = 'Translation (i18n)';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'m-date-3\', \'\', \'Date: \', \'required\');

$form->addPlugin(\'material-datepicker\', \'#m-date-3\', \'default\', array(\'language\' => \'fr_FR\'));');

$output['form'][]        = '<pre><code class="language-php">// We cannot show the datepicker translated here
// because using several different languages on the same page will throw an error.</code></pre>';
$output['html_code'][]   = '';

echo renderExample($output);
