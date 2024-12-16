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

$form_id = 'plugins-modal-form-1';

$form = new Form($form_id, 'vertical');

$form->addInput('text', 'user-name-modal', '', 'username', 'required');
$form->addInput('email', 'user-email-modal', '', 'e-mail address', 'required');
$form->centerContent();
$form->addBtn('button', 'cancel-btn-modal', 1, 'Cancel', 'class=btn btn-default, data-modal-close=modal-target', 'submit_group');
$form->addBtn('submit', 'submit-btn-modal', 1, 'Send ', 'class=btn btn-success', 'submit_group');
$form->printBtnGroup('submit_group');

$modal_options = [
    'title'       => 'Here is a modal form',
    'title-class' => 'text-secondary font-weight-light',
    'title-tag'   => 'h3',
    'animation'   => 'flip-in-horizontal'
];
$form->modal($modal_options);


$output['form_code'][] = htmlspecialchars('<?php
$form = new Form(\'' . $form_id . '\', \'vertical\');

$form->addInput(\'text\', \'user-name-modal\', \'\', \'username\', \'required\');
$form->addInput(\'email\', \'user-email-modal\', \'\', \'e-mail address\', \'required\');
$form->centerContent();
$form->addBtn(\'button\', \'cancel-btn-modal\', 1, \'Cancel\', \'class=btn btn-default, data-modal-close=modal-target\', \'submit_group\');
$form->addBtn(\'submit\', \'submit-btn-modal\', 1, \'Send \', \'class=btn btn-success\', \'submit_group\');
$form->printBtnGroup(\'submit_group\');

$modal_options = [
    \'title\'       => \'Here is a modal form\',
    \'title-class\' => \'text-secondary font-weight-light\',
    \'title-tag\'   => \'h3\',
    \'animation\'   => \'flip-in-horizontal\'
];
$form->modal($modal_options);
?>

<div class="text-center">
    <button data-micromodal-trigger="modal-plugins-modal-form-1" class="btn btn-primary text-white btn-lg">Open the modal form</button>
</div>');

$output['form'][] = $form;
$output['html_code'][] = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
