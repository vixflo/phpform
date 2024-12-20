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

$form_id = 'plugins-tinymce-form-1';

$form = new Form($form_id, 'vertical');


$form->addTextarea('tinymce-textarea', '', 'Enter content here', 'cols=100, rows=20, class=tinyMce');

$form->addPlugin('tinymce', '#tinymce-textarea');


$output['title'][]      = '';
$output['subtitle'][]  = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addTextarea(\'tinymce-textarea\', \'\', \'Enter content here\', \'cols=100, rows=20, class=tinyMce\');

$form->addPlugin(\'tinymce\', \'#tinymce-textarea\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-tinymce-form-2';

$form = new Form($form_id, 'vertical');


$form->addTextarea('tinymce-textarea-2', '', 'Enter content here', 'cols=100, rows=20, class=tinyMce');

$form->addPlugin('tinymce', '#tinymce-textarea-2', 'word-char-count', array('maxCharacters' => 20));


$output['title'][]     = 'TinyMce with Word Characters counter';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addTextarea(\'tinymce-textarea-2\', \'\', \'Enter content here\', \'cols=100, rows=20, class=tinyMce\');

$form->addPlugin(\'tinymce\', \'#tinymce-textarea-2\', \'word-char-count\', array(\'maxCharacters\' => 20));');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
