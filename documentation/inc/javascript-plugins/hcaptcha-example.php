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

$form_id = 'plugins-hcaptcha-form-1';

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('plugins-hcaptcha-form-1') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('plugins-hcaptcha-form-1');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');
}

$form = new Form($form_id, 'vertical');
$form->setAction('javascript-plugins.php#hcaptcha-example');

$form->addInput('text', 'name', '', 'Your name', 'required');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=text-center');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="bi bi-envelope append" aria-hidden="true"></i>', 'class=btn btn-primary');


$output['title'][]      = '';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken(\'plugins-hcaptcha-form-1\') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate(\'plugins-hcaptcha-form-1\');

    // hcaptcha validation
    $validator->hcaptcha(\'hcaptcha-secret-key\', \'Captcha Error\')->validate(\'h-captcha-response\');
}

$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'text\', \'name\', \'\', \'Your name\', \'required\');
$form->addHcaptcha(\'hcaptcha-site-key\', \'class=text-center\');
$form->centerContent();
$form->addBtn(\'submit\', \'submit-btn\', 1, \'Send <i class="bi bi-envelope append" aria-hidden="true"></i>\', \'class=btn btn-primary\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/


$form_id = 'plugins-hcaptcha-form-2';

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('plugins-hcaptcha-form-2') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('plugins-hcaptcha-form-2');

    // hcaptcha validation
    $validator->hcaptcha('0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d', 'Captcha Error')->validate('h-captcha-response');
}

$form = new Form($form_id, 'vertical');
$form->setAction('javascript-plugins.php#hcaptcha-example');

$form->addInput('text', 'name', '', 'Your name', 'required');
$form->addHcaptcha('321856aa-ff29-4ab6-840a-8db73ca51dbf', 'class=text-center, data-theme=dark, data-size=compact');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Send <i class="bi bi-envelope append" aria-hidden="true"></i>', 'class=btn btn-primary');


$output['title'][]      = 'Compact dark HCaptcha';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken(\'plugins-hcaptcha-form-2\') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate(\'plugins-hcaptcha-form-2\');

    // hcaptcha validation
    $validator->hcaptcha(\'hcaptcha-secret-key\', \'Captcha Error\')->validate(\'h-captcha-response\');
}

$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'text\', \'name\', \'\', \'Your name\', \'required\');
$form->addHcaptcha(\'321856aa-ff29-4ab6-840a-8db73ca51dbf\', \'class=text-center, data-theme=dark, data-size=compact\');
$form->centerContent();
$form->addBtn(\'submit\', \'submit-btn\', 1, \'Send <i class="bi bi-envelope append" aria-hidden="true"></i>\', \'class=btn btn-primary\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
