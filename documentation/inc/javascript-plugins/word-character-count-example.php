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

$form_id = 'plugins-word-char-count-form-1';

$form = new Form($form_id, 'vertical');


$form->addTextarea('word-char-count-textarea', '', 'Enter content here', 'cols=100, rows=10');

$form->addPlugin('word-character-count', '#word-char-count-textarea', 'default', array('maxCharacters' => 15));


$output['title'][]      = '';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addTextarea(\'word-char-count-textarea\', \'\', \'Enter content here\', \'cols=100, rows=20\');

$form->addPlugin(\'word-character-count\', \'#word-char-count-textarea\', \'default\', array(\'maxCharacters\' => 15));');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-word-char-count-form-2';

$form = new Form($form_id, 'vertical');


$form->addTextarea('word-char-count-textarea-2', '', 'Enter content here', 'cols=100, rows=10');

$form->addPlugin('word-character-count', '#word-char-count-textarea-2', 'default', array('maxWords' => 3, 'characterCount' => false));


$output['title'][]      = 'Word count only';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addTextarea(\'word-char-count-textarea-2\', \'\', \'Enter content here\', \'cols=100, rows=20\');

$form->addPlugin(\'word-character-count\', \'#word-char-count-textarea-2\', \'default\', array(\'maxWords\' => 3, \'characterCount\' => false));');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
