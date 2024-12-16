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

$form_id = 'plugins-bootstrap-select-form-1';

$form = new Form($form_id, 'horizontal');


$form->addOption('reservation-type', 'Dinner', 'Dinner', '', 'data-icon=bi-cup-straw');
$form->addOption('reservation-type', 'Birthday/ Anniversary', 'Birthday/ Anniversary', '', 'data-icon=bi-calendar2-date-fill');
$form->addOption('reservation-type', 'Nightlife', 'Nightlife', '', 'data-icon=bi-moon-stars-fill');
$form->addOption('reservation-type', 'Private', 'Private', '', 'data-icon=bi-person-badge-fill');
$form->addOption('reservation-type', 'Wedding', 'Wedding', '', 'data-icon=bi-heart-fill');
$form->addOption('reservation-type', 'Corporate', 'Corporate', '', 'data-icon=bi-briefcase-fill');
$form->addOption('reservation-type', 'Other', 'Other', '', 'data-icon=bi-star-fill');

$form->addSelect('reservation-type', 'Reservation Type', 'class=selectpicker');


$output['title'][]     = 'Select with icons';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'reservation-type\', \'Dinner\', \'Dinner\', \'\', \'data-icon=bi-cup-straw\');
$form->addOption(\'reservation-type\', \'Birthday/ Anniversary\', \'Birthday/ Anniversary\', \'\', \'data-icon=bi-calendar2-date-fill\');
$form->addOption(\'reservation-type\', \'Nightlife\', \'Nightlife\', \'\', \'data-icon=bi-moon-stars-fill\');
$form->addOption(\'reservation-type\', \'Private\', \'Private\', \'\', \'data-icon=bi-person-badge-fill\');
$form->addOption(\'reservation-type\', \'Wedding\', \'Wedding\', \'\', \'data-icon=bi-heart-fill\');
$form->addOption(\'reservation-type\', \'Corporate\', \'Corporate\', \'\', \'data-icon=bi-briefcase-fill\');
$form->addOption(\'reservation-type\', \'Other\', \'Other\', \'\', \'data-icon=bi-star-fill\');

$form->addSelect(\'reservation-type\', \'Reservation Type\', \'class=selectpicker\');');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-bootstrap-select-form-2';

$form = new Form($form_id, 'horizontal');


$form->addOption('product-choice[]', 'Computers', 'Computers', '', 'data-icon=bi-laptop');
$form->addOption('product-choice[]', 'Games', 'Games', '', 'data-icon=bi-controller');
$form->addOption('product-choice[]', 'Books', 'Books', '', 'selected, data-icon=bi-book');
$form->addOption('product-choice[]', 'Music', 'Music', '', 'selected, data-icon=bi-headphones');
$form->addOption('product-choice[]', 'Photos', 'Photos', '', 'data-icon=bi-camera');
$form->addOption('product-choice[]', 'Films', 'Films', '', 'data-icon=bi-film');

$form->addHelper('(multiple choices)', 'product-choice[]');

$form->addSelect('product-choice[]', 'What products are you interested in ?', 'class=selectpicker, data-width=100%, multiple=multiple, required');


$output['title'][]     = 'Select multiple with icons';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$form->addOption(\'product-choice[]\', \'Computers\', \'Computers\', \'\', \'data-icon=bi-laptop\');
$form->addOption(\'product-choice[]\', \'Games\', \'Games\', \'\', \'data-icon=bi-controller\');
$form->addOption(\'product-choice[]\', \'Books\', \'Books\', \'\', \'selected, data-icon=bi-book\');
$form->addOption(\'product-choice[]\', \'Music\', \'Music\', \'\', \'selected, data-icon=bi-headphones\');
$form->addOption(\'product-choice[]\', \'Photos\', \'Photos\', \'\', \'data-icon=bi-camera\');
$form->addOption(\'product-choice[]\', \'Films\', \'Films\', \'\', \'data-icon=bi-film\');

$form->addHelper(\'(multiple choices)\', \'product-choice[]\');

$form->addSelect(\'product-choice[]\', \'What products are you interested in ?\', \'class=selectpicker, data-width=100%, multiple=multiple, required\');\');');
$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-bootstrap-select-form-3';

$form = new Form($form_id, 'vertical');


$options = array('Adella', 'Alfred', 'Bell', 'Britteny', 'Brittni', 'Brooke', 'Candace', 'Cara', 'Carlena', 'Charise', 'Claris', 'Cornelia', 'Danilo', 'Drew', 'Ella', 'Evangelina', 'Graham', 'Hien', 'Hipolito', 'Jacque', 'Janeen', 'Joane', 'Jolanda', 'Josette', 'Jovan', 'Kelley', 'Lashanda', 'Lavona', 'Lavonda', 'Lin', 'Linnie', 'Loreen', 'Mandi', 'Marybeth', 'Maurita', 'Mozella', 'Narcisa', 'Percy', 'Reda', 'Renate', 'Rivka', 'Sanjuana', 'Shanice', 'Tammi', 'Tawny', 'Tyson', 'Valene', 'Wendell', 'Yesenia', 'Zulma');

foreach ($options as $o) {
    $form->addOption('first-name-select[]', $o, $o);
}

$form->addSelect('first-name-select[]', 'Choose your preferred first names', 'class=selectpicker, data-actions-box=true, data-live-search=true, data-size=10, multiple=multiple');


$output['title'][]     = 'Select multiple with live search';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'vertical\');

$options = array(\'Adella\', \'Alfred\', \'Bell\', \'Britteny\', \'Brittni\', \'Brooke\', \'Candace\', \'Cara\', \'Carlena\', \'Charise\', \'Claris\', \'Cornelia\', \'Danilo\', \'Drew\', \'Ella\', \'Evangelina\', \'Graham\', \'Hien\', \'Hipolito\', \'Jacque\', \'Janeen\', \'Joane\', \'Jolanda\', \'Josette\', \'Jovan\', \'Kelley\', \'Lashanda\', \'Lavona\', \'Lavonda\', \'Lin\', \'Linnie\', \'Loreen\', \'Mandi\', \'Marybeth\', \'Maurita\', \'Mozella\', \'Narcisa\', \'Percy\', \'Reda\', \'Renate\', \'Rivka\', \'Sanjuana\', \'Shanice\', \'Tammi\', \'Tawny\', \'Tyson\', \'Valene\', \'Wendell\', \'Yesenia\', \'Zulma\');

foreach ($options as $o) {
    $form->addOption(\'first-name-select[]\', $o, $o);
}

$form->addSelect(\'first-name-select[]\', \'Choose your preferred first names\', \'class=selectpicker, data-actions-box=true, data-live-search=true, data-size=10, multiple=multiple\');');
$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 4 ----------*/

$form_id = 'plugins-bootstrap-select-4';

$form = new Form($form_id, 'horizontal');


$options = array(
    'plugin'       => 'bootstrap-select',
    'lang'         => 'en',
    'flags'        => true,
    'flag_size'    => 16,
    'return_value' => 'code',
);
$form->addCountrySelect('country-bootstrap-select', 'country: ', 'title=Select a country', $options);


$output['title'][]     = 'Select Country';
$output['subtitle'][]  = 'uses the <code>addCountrySelect()</code> function';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\', \'horizontal\');

$options = array(
    \'plugin\'       => \'bootstrap-select\',
    \'lang\'         => \'en\',
    \'flags\'        => true,
    \'flag_size\'    => 16,
    \'return_value\' => \'code\',
);
$form->addCountrySelect(\'country-bootstrap-select\', \'country: \', \'title=Select a country\', $options);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
