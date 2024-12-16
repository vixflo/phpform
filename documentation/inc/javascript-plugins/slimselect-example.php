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

$form_id = 'plugins-slimselect-form-1';

$form = new Form($form_id, 'horizontal');


$form->addOption('position-applying-for-slim', '', '', '', 'data-placeholder=true');
$form->addOption('position-applying-for-slim', 'Interface Designer', 'Interface Designer');
$form->addOption('position-applying-for-slim', 'Software Engineer', 'Software Engineer');
$form->addOption('position-applying-for-slim', 'System Administrator', 'System Administrator');
$form->addOption('position-applying-for-slim', 'Office Manager', 'Office Manager');

$form->addSelect('position-applying-for-slim', 'Which position are you applying for ?', 'data-slimselect=true, data-placeholder=Choose one ..., required');


$output['title'][]     = 'Select with placeholder';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'position-applying-for-slim\', \'\', \'\', \'\', \'data-placeholder=true\');
$form->addOption(\'position-applying-for-slim\', \'Interface Designer\', \'Interface Designer\');
$form->addOption(\'position-applying-for-slim\', \'Software Engineer\', \'Software Engineer\');
$form->addOption(\'position-applying-for-slim\', \'System Administrator\', \'System Administrator\');
$form->addOption(\'position-applying-for-slim\', \'Office Manager\', \'Office Manager\');

$form->addSelect(\'position-applying-for-slim\', \'Which position are you applying for ?\', \'data-slimselect=true, data-placeholder=Choose one ..., required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-slimselect-form-2';

$form = new Form($form_id, 'horizontal');


$form->addOption('product-choice-slim[]', 'Computers', 'Computers', '', 'data-icon=bi bi-pc-display me-2');
$form->addOption('product-choice-slim[]', 'Games', 'Games', '', 'data-icon=bi bi-controller me-2');
$form->addOption('product-choice-slim[]', 'Books', 'Books', '', 'selected, data-icon=bi bi-book me-2');
$form->addOption('product-choice-slim[]', 'Music', 'Music', '', 'selected, data-icon=bi bi-headphones me-2');
$form->addOption('product-choice-slim[]', 'Photos', 'Photos', '', 'data-icon=bi bi-camera-fill me-2');
$form->addOption('product-choice-slim[]', 'Films', 'Films', '', 'data-icon=bi bi-camera-reels-fill me-2');

$form->addHelper('(multiple choices)', 'product-choice-slim[]');

$form->addSelect('product-choice-slim[]', 'What products are you interested in ?', 'data-slimselect=true, multiple, required');


$output['title'][]     = 'Select multiple with icons';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'product-choice-slim[]\', \'Computers\', \'Computers\', \'\', \'data-icon=bi bi-pc-display me-2\');
$form->addOption(\'product-choice-slim[]\', \'Games\', \'Games\', \'\', \'data-icon=bi bi-controller me-2\');
$form->addOption(\'product-choice-slim[]\', \'Books\', \'Books\', \'\', \'selected, data-icon=bi bi-book me-2\');
$form->addOption(\'product-choice-slim[]\', \'Music\', \'Music\', \'\', \'selected, data-icon=bi bi-headphones me-2\');
$form->addOption(\'product-choice-slim[]\', \'Photos\', \'Photos\', \'\', \'data-icon=bi bi-camera-fill me-2\');
$form->addOption(\'product-choice-slim[]\', \'Films\', \'Films\', \'\', \'data-icon=bi bi-camera-reels-fill me-2\');

$form->addHelper(\'(multiple choices)\', \'product-choice-slim[]\');

$form->addSelect(\'product-choice-slim[]\', \'What products are you interested in ?\', \'data-slimselect=true, multiple, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-slimselect-form-3';

$form = new Form($form_id, 'vertical');


$form->addOption('bg-color-slim', 'primary', 'Primary', 'Blue', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-primary\' style\=\'width:40px;\'>&nbsp;</span>Primary');
$form->addOption('bg-color-slim', 'info', 'Info', 'Blue', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-info\' style\=\'width:40px;\'>&nbsp;</span>Info');
$form->addOption('bg-color-slim', 'secondary', 'Secondary', 'Grey', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-secondary\' style\=\'width:40px;\'>&nbsp;</span>Secondary');

$form->addOption('bg-color-slim', 'light', 'Light', 'Grey', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-light\' style\=\'width:40px;\'>&nbsp;</span>Light');
$form->addOption('bg-color-slim', 'warning', 'Warning', 'Others', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-warning\' style\=\'width:40px;\'>&nbsp;</span>Warning');
$form->addOption('bg-color-slim', 'danger', 'Danger', 'Others', 'data-html=<span class\=\'d-inline-block h-100 me-2 bg-danger\' style\=\'width:40px;\'>&nbsp;</span>Danger');

$form->addSelect('bg-color-slim', 'Background color', 'data-slimselect=true');


$output['title'][]     = 'Select with option groups &amp; options built with custom html<br><small>Note that the equal sign and single quotes are all escaped with a backslash in the options html content</small>';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form->addOption(\'bg-color-slim\', \'primary\', \'Primary\', \'Blue\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-primary\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Primary\');
$form->addOption(\'bg-color-slim\', \'info\', \'Info\', \'Blue\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-info\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Info\');
$form->addOption(\'bg-color-slim\', \'secondary\', \'Secondary\', \'Grey\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-secondary\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Secondary\');

$form->addOption(\'bg-color-slim\', \'light\', \'Light\', \'Grey\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-light\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Light\');
$form->addOption(\'bg-color-slim\', \'warning\', \'Warning\', \'Others\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-warning\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Warning\');
$form->addOption(\'bg-color-slim\', \'danger\', \'Danger\', \'Others\', \'data-html=<span class\=\\\'d-inline-block h-100 me-2 bg-danger\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>Danger\');

$form->addSelect(\'bg-color-slim\', \'Background color\', \'data-slimselect=true\');');
$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-slimselect-form-4';

$form = new Form($form_id, 'horizontal');


$form->addOption('favorite-animals-slim[]', 'Cat', 'Cat');
$form->addOption('favorite-animals-slim[]', 'Dog', 'Dog');
$form->addOption('favorite-animals-slim[]', 'Lion', 'Lion');
$form->addOption('favorite-animals-slim[]', 'Rabbit', 'Rabbit');
$form->addOption('favorite-animals-slim[]', 'Mosquito', 'Mosquito');

$form->addHelper('3 animals max., type in the field to add your custom ones', 'favorite-animals-slim[]');

$form->addSelect('favorite-animals-slim[]', 'Choose your favorite animals', 'data-slimselect=true, data-limit=3, data-addable=true, data-close-on-select=false, multiple, required');


$output['title'][]     = 'Select multiple tags, dynamic option creation, maximum limit';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'favorite-animals-slim[]\', \'Cat\', \'Cat\');
$form->addOption(\'favorite-animals-slim[]\', \'Dog\', \'Dog\');
$form->addOption(\'favorite-animals-slim[]\', \'Lion\', \'Lion\');
$form->addOption(\'favorite-animals-slim[]\', \'Rabbit\', \'Rabbit\');
$form->addOption(\'favorite-animals-slim[]\', \'Mosquito\', \'Mosquito\');

$form->addHelper(\'3 animals max., type in the field to add your custom ones\', \'favorite-animals-slim[]\');

$form->addSelect(\'favorite-animals-slim[]\', \'Choose your favorite animals\', \'data-slimselect=true, data-tags=true, data-maximum-selection-length=3, data-close-on-select=true, data-language=es, multiple, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 5 ----------*/

$form_id = 'plugins-slimselect-form-5';

$form = new Form($form_id, 'horizontal');


$form->addCountrySelect('country-slimselect', 'country: ', 'title=Select a country');


$output['title'][]     = 'Select Country';
$output['subtitle'][]  = 'uses the <code>addCountrySelect()</code> function';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addCountrySelect(\'country-slimselect\', \'country: \', \'title=Select a country\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
