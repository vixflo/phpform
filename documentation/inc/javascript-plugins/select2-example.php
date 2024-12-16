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

$form_id = 'plugins-select2-form-1';

$form = new Form($form_id, 'horizontal');


$form->addOption('position-applying-for-s2', '', '');
$form->addOption('position-applying-for-s2', 'Interface Designer', 'Interface Designer');
$form->addOption('position-applying-for-s2', 'Software Engineer', 'Software Engineer');
$form->addOption('position-applying-for-s2', 'System Administrator', 'System Administrator');
$form->addOption('position-applying-for-s2', 'Office Manager', 'Office Manager');

$form->addSelect('position-applying-for-s2', 'Which position are you applying for ?', 'class=select2, data-placeholder=Choose one ..., required');


$output['title'][]     = 'Select with placeholder';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'position-applying-for-s2\', \'\', \'\');
$form->addOption(\'position-applying-for-s2\', \'Interface Designer\', \'Interface Designer\');
$form->addOption(\'position-applying-for-s2\', \'Software Engineer\', \'Software Engineer\');
$form->addOption(\'position-applying-for-s2\', \'System Administrator\', \'System Administrator\');
$form->addOption(\'position-applying-for-s2\', \'Office Manager\', \'Office Manager\');

$form->addSelect(\'position-applying-for-s2\', \'Which position are you applying for ?\', \'class=select2, data-placeholder=Choose one ..., required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-select2-form-2';

$form = new Form($form_id, 'horizontal');


$form->addOption('product-choice-s2[]', 'Computers', 'Computers', '', 'data-icon=bi bi-pc-display me-2');
$form->addOption('product-choice-s2[]', 'Games', 'Games', '', 'data-icon=bi bi-controller me-2');
$form->addOption('product-choice-s2[]', 'Books', 'Books', '', 'selected, data-icon=bi bi-book me-2');
$form->addOption('product-choice-s2[]', 'Music', 'Music', '', 'selected, data-icon=bi bi-headphones me-2');
$form->addOption('product-choice-s2[]', 'Photos', 'Photos', '', 'data-icon=bi bi-camera-fill me-2');
$form->addOption('product-choice-s2[]', 'Films', 'Films', '', 'data-icon=bi bi-camera-reels-fill me-2');

$form->addHelper('(multiple choices)', 'product-choice-s2[]');

$form->addSelect('product-choice-s2[]', 'What products are you interested in ?', 'class=select2, multiple, required');


$output['title'][]     = 'Select multiple with icons';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'product-choice-s2[]\', \'Computers\', \'Computers\', \'\', \'data-icon=bi bi-pc-display me-2\');
$form->addOption(\'product-choice-s2[]\', \'Games\', \'Games\', \'\', \'data-icon=bi bi-controller me-2\');
$form->addOption(\'product-choice-s2[]\', \'Books\', \'Books\', \'\', \'selected, data-icon=bi bi-book me-2\');
$form->addOption(\'product-choice-s2[]\', \'Music\', \'Music\', \'\', \'selected, data-icon=bi bi-headphones me-2\');
$form->addOption(\'product-choice-s2[]\', \'Photos\', \'Photos\', \'\', \'data-icon=bi bi-camera-fill me-2\');
$form->addOption(\'product-choice-s2[]\', \'Films\', \'Films\', \'\', \'data-icon=bi bi-camera-reels-fill me-2\');

$form->addHelper(\'(multiple choices)\', \'product-choice-s2[]\');

$form->addSelect(\'product-choice-s2[]\', \'What products are you interested in ?\', \'class=select2, multiple, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-select2-form-3';

$form = new Form($form_id, 'vertical');


$form->addOption('bg-color', 'primary', 'Primary', 'Blue', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-primary\' style\=\'width:40px;\'>&nbsp;</span>');
$form->addOption('bg-color', 'info', 'Info', 'Blue', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-info\' style\=\'width:40px;\'>&nbsp;</span>');
$form->addOption('bg-color', 'secondary', 'Secondary', 'Grey', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-secondary\' style\=\'width:40px;\'>&nbsp;</span>');

$form->addOption('bg-color', 'light', 'Light', 'Grey', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-light\' style\=\'width:40px;\'>&nbsp;</span>');
$form->addOption('bg-color', 'warning', 'Warning', 'Others', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-warning\' style\=\'width:40px;\'>&nbsp;</span>');
$form->addOption('bg-color', 'danger', 'Danger', 'Others', 'data-content=<span class\=\'d-inline-block h-100 me-2 bg-danger\' style\=\'width:40px;\'>&nbsp;</span>');

$form->addSelect('bg-color', 'Background color', 'class=select2');


$output['title'][]     = 'Select with option groups &amp; options built with custom html<br><small>Note that the equal sign and single quotes are all escaped with a backslash in the options html content</small>';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form->addOption(\'bg-color\', \'primary\', \'Primary\', \'Blue\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-primary\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');
$form->addOption(\'bg-color\', \'info\', \'Info\', \'Blue\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-info\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');
$form->addOption(\'bg-color\', \'secondary\', \'Secondary\', \'Grey\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-secondary\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');

$form->addOption(\'bg-color\', \'light\', \'Light\', \'Grey\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-light\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');
$form->addOption(\'bg-color\', \'warning\', \'Warning\', \'Others\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-warning\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');
$form->addOption(\'bg-color\', \'danger\', \'Danger\', \'Others\', \'data-content=<span class\=\\\'d-inline-block h-100 me-2 bg-danger\\\' style\=\\\'width:40px;\\\'>&nbsp;</span>\');

$form->addSelect(\'bg-color\', \'Background color\', \'class=select2\');');
$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-select2-form-4';

$form = new Form($form_id, 'horizontal');


$form->addOption('favorite-animals-s2[]', 'Cat', 'Cat');
$form->addOption('favorite-animals-s2[]', 'Dog', 'Dog');
$form->addOption('favorite-animals-s2[]', 'Lion', 'Lion');
$form->addOption('favorite-animals-s2[]', 'Rabbit', 'Rabbit');
$form->addOption('favorite-animals-s2[]', 'Mosquito', 'Mosquito');

$form->addHelper('3 animals max., type in the field to add your custom ones', 'favorite-animals-s2[]');

$form->addSelect('favorite-animals-s2[]', 'Choose your favorite animals', 'class=select2, data-tags=true, data-maximum-selection-length=3, data-close-on-select=true, data-language=es, multiple, required');


$output['title'][]     = '<small>Select multiple tags, dynamic option creation, maximum limit &amp; custom language for messages</small>';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'favorite-animals-s2[]\', \'Cat\', \'Cat\');
$form->addOption(\'favorite-animals-s2[]\', \'Dog\', \'Dog\');
$form->addOption(\'favorite-animals-s2[]\', \'Lion\', \'Lion\');
$form->addOption(\'favorite-animals-s2[]\', \'Rabbit\', \'Rabbit\');
$form->addOption(\'favorite-animals-s2[]\', \'Mosquito\', \'Mosquito\');

$form->addHelper(\'3 animals max., type in the field to add your custom ones\', \'favorite-animals-s2[]\');

$form->addSelect(\'favorite-animals-s2[]\', \'Choose your favorite animals\', \'class=select2, data-tags=true, data-maximum-selection-length=3, data-close-on-select=true, data-language=es, multiple, required\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 5 ----------*/

$form_id = 'plugins-select2-form-5';

$form = new Form($form_id, 'horizontal');

$options = array(
    'plugin'       => 'select2',
    'lang'         => 'en',
    'flags'        => true,
    'flag_size'    => 32,
    'return_value' => 'code',
);
$form->addCountrySelect('country-select2', 'country: ', 'title=Select a country', $options);


$output['title'][]     = 'Select Country';
$output['subtitle'][]  = 'uses the <code>addCountrySelect()</code> function';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$options = array(
    \'plugin\'       => \'select2\',
    \'lang\'         => \'en\',
    \'flags\'        => true,
    \'flag_size\'    => 32,
    \'return_value\' => \'code\',
);
$form->addCountrySelect(\'country-select2\', \'country: \', \'title=Select a country\', $options);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
