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

$form_id = 'plugins-litepicker-form-1';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-date', '', 'Choose the date:', 'data-litepick=true');


$output['title'][]      = 'Single Date selector with minimum options';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-date\', \'\', \'Choose the date:\', \'data-litepick=true\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-litepicker-form-2';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'my-daterange', '', 'Choose the start and end dates:', 'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2');


$output['title'][]      = 'Date range selector with minimum options';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'my-daterange\', \'\', \'Choose the start and end dates:\', \'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-litepicker-form-3';

$form = new Form($form_id, 'horizontal');

// set minimum date
$now      = new DateTime('now');
$date_min = $now->format('Y-m-d');

$form->addInput('text', 'my-daterange-3', '', 'Choose the start and end dates', 'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2, data-min-date=' . $date_min . ', data-format=DD MMMM YYYY');

$output['title'][]     = 'Date range selector with a minimum date (now) and a custom format';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

// set minimum date
$now      = new DateTime(\'now\');
$date_min = $now->format(\'Y-m-d\');

$form->addInput(\'text\', \'my-daterange-2\', \'\', \'Choose the start and end dates\', \'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2, data-min-date=\' . $date_min . \', data-format=DD MMMM YYYY\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-litepicker-form-4';

$form = new Form($form_id, 'vertical');

// set minimum date
$now      = new DateTime('now');
$date_min = $now->format('Y-m-d');

$form->addInput('text', 'pick-up-date', '', 'Pick-up Date', 'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2, data-min-date=' . $date_min . ', data-format=YYYY-MM-DD, data-element-end=drop-off-date, data-split-view=true, required');
$form->addInput('text', 'drop-off-date', '', 'Drop-off Date', 'readonly, required');

$output['title'][]     = 'Date range selector with a minimum date, a custom format and start date / end date in 2 separate fields';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

// set minimum date
$now      = new DateTime(\'now\');
$date_min = $now->format(\'Y-m-d\');

$form->addInput(\'text\', \'pick-up-date\', \'\', \'Pick-up Date\', \'data-litepick=true, data-single-mode=false, data-number-of-columns=2, data-number-of-months=2, data-min-date=\' . $date_min . \', data-format=YYYY-MM-DD, data-element-end=drop-off-date, data-split-view=true, required\');
$form->addInput(\'text\', \'drop-off-date\', \'\', \'Drop-off Date\', \'readonly, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 5 ----------*/

$form_id = 'plugins-litepicker-form-5';

$form = new Form($form_id, 'horizontal');


$form->addInput('text', 'birth_date', '', 'Birth Date', 'placeholder=click to open calendar, data-litepick=true, data-select-forward=false, data-dropdown-min-year=1920, data-dropdown-months=true, data-dropdown-years=true');

$output['title'][]      = 'Date picker with Months &amp; Years dropdown selectors';
$output['subtitle'][]   = '';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addInput(\'text\', \'birth_date\', \'\', \'Birth Date\', \'placeholder=click to open calendar, data-litepick=true, data-select-forward=false, data-dropdown-min-year=1920, data-dropdown-months=true, data-dropdown-years=true\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
