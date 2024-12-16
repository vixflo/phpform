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

$form_id = 'plugins-captcha-form-1';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'j-captcha-input', '', 'Type in result please', 'class=jCaptcha');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary', '');


$output['title'][]     = '';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'j-captcha-input\', \'\', \'Type in result please\', \'class=jCaptcha\');
$form->addBtn(\'submit\', \'submit-btn\', 1, \'Submit\', \'class=btn btn-primary\', \'\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-captcha-form-2';

$form = new Form($form_id);

$form->addInput('text', 'j-captcha-input-2', '', 'Type in result please', 'class=jCaptcha, data-color=#f00, data-error-text=This is a custome error text');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-primary', '');

$output['title'][]      = 'JS Captcha with custom challenge color and custom error text';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\');

$form->addInput(\'text\', \'j-captcha-input-2\', \'\', \'Type in result please\', \'class=jCaptcha, data-color=#f00, data-error-text=This is a custome error text\');
$form->addBtn(\'submit\', \'submit-btn\', 1, \'Submit\', \'class=btn btn-primary\', \'\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
