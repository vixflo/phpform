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

$form_id = 'plugins-popover-form-1';

$form = new Form($form_id, 'vertical');


$form->addInput('text', 'user-name-popover', '', 'username', 'required');
$form->addInput('email', 'user-email-popover', '', 'e-mail address', 'required');
$form->centerContent();
$form->addBtn('button', 'cancel-btn-popover', 1, 'Cancel', 'class=btn btn-default', 'submit_group');
$form->addBtn('submit', 'submit-btn-popover', 1, 'Send ', 'class=btn btn-success', 'submit_group');
$form->printBtnGroup('submit_group');

$form->popover();

$output['form_code'][] = htmlspecialchars('<?php
$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'text\', \'user-name-popover\', \'\', \'username\', \'required\');
$form->addInput(\'email\', \'user-email-popover\', \'\', \'e-mail address\', \'required\');
$form->centerContent();
$form->addBtn(\'button\', \'cancel-btn-popover\', 1, \'Cancel\', \'class=btn btn-default\', \'submit_group\');
$form->addBtn(\'submit\', \'submit-btn-popover\', 1, \'Send \', \'class=btn btn-success\', \'submit_group\');
$form->printBtnGroup(\'submit_group\');

$form->popover();
?>

<div class="d-flex justify-content-between">
    <button data-popover-trigger="plugins-popover-form-1" class="btn btn-warning">Open the popover form</button>
    <button data-popover-trigger="plugins-popover-form-1" data-animation="perspective" data-backdrop="true" data-theme="light-border" class="btn btn-primary text-white">Open the same popover form with different settings</button>
</div>');

$output['form'][] = $form;

$output['html_code'][] = trim(htmlspecialchars('
<div class="hide hidden d-none">
    <div id="' . $form_id . '-content">
        <form id="' . $form_id . '" class="form-horizontal popover-form">' . $form->cleanHtmlOutput($form->html) . '
        </form>
    </div>
</div>'));

echo renderExample($output);
