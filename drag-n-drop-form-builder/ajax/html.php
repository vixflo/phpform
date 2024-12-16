<?php

use phpformbuilder\Form;

session_start();
include_once '../../phpformbuilder/autoload.php';
$json = json_decode($_POST['data']);

foreach ($json as $var => $val) {
    ${$var} = $val;
}

$value = isset($value) ? $value : '';

$form = new Form('fg-element', 'horizontal');
$form->addHtml($value);
echo '<code class="text-truncate" style="white-space:pre-wrap;">' . htmlspecialchars($form->html) . '</code>';
