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

$form_id = 'plugins-search-form-1';

$form = new Form($form_id);

$addon = '<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>';
$form->addAddon('search-input-1', $addon, 'after');
$form->addHelper('Type for example "A"', 'search-input-1');
$form->addInput('search', 'search-input-1', '', 'Search something:', 'placeholder=Search here ...');

$src = [
    'src' => [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ]
];

$form->addPlugin('autocomplete', '#search-input-1', 'default', $src);

$output['title'][]     = '';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\');

$addon = \'<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>\';
$form->addAddon(\'search-input-1\', $addon, \'after\');
$form->addHelper(\'Type for example "A"\', \'search-input-1\');
$form->addInput(\'text\', \'search-input-1\', \'\', \'Search something:\', \'placeholder=Search here ...\');

$src = [
    \'src\' => [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ]
];

$form->addPlugin(\'autocomplete\', \'#search-input-1\', \'default\', $src);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 2 ----------*/

$form_id = 'plugins-search-form-2';

$form = new Form($form_id);

$addon = '<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>';
$form->addAddon('search-input-2', $addon, 'after');
$form->addHelper('Type 2 letters minimum', 'search-input-2');
$form->addInput('search', 'search-input-2', '', 'Search something:', 'data-start-with=true, data-max-results=5, data-debounce=400, data-threshold=2, placeholder=Search here ...');

$src = [
    'src' => [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ]
];

$form->addPlugin('autocomplete', '#search-input-2', 'default', $src);

$output['title'][]      = 'Autocomplete with several data-attributes enabled';
$output['subtitle'][]   = '<ul class="small"><li>Result list items must start with the search string</li><li>debounce (delay before searching)</li><li>maximum results = 5</li><li>threshold (2 characters minimum before search)</li></ul>';
$output['form_code'][]  = htmlspecialchars('$form = new Form(\'' . $form_id . '\');

$addon = \'<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>\';
$form->addAddon(\'search-input-2\', $addon, \'after\');
$form->addHelper(\'Type for example "A"\', \'search-input-2\');
$form->addInput(\'text\', \'search-input-2\', \'\', \'Search something:\', \'data-start-with=true, data-max-results=5, data-debounce=400, data-threshold=2, placeholder=Search here ...\');

$src = [
    \'src\' => [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ]
];

$form->addPlugin(\'autocomplete\', \'#search-input-2\', \'default\', $src);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

/*----------  example 3 ----------*/

$form_id = 'plugins-search-form-3';

$form = new Form($form_id);

$addon = '<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>';
$form->addAddon('search-input-3', $addon, 'after');
$form->addHelper('Type at lease 2 characters', 'search-input-3');
$form->addInput('search', 'search-input-3', '', 'First name:', 'data-threshold=2, placeholder=Search here ...');

$src = ['src' => 'inc/javascript-plugins/complete.php'];

$form->addPlugin('autocomplete', '#search-input-3', 'ajax', $src);

$output['title'][]     = 'Autocomplete with Ajax search';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\');

$addon = \'<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>\';
$form->addAddon(\'search-input-3\', $addon, \'after\');
$form->addHelper(\'Type at lease 2 characters\', \'search-input-3\');
$form->addInput(\'search\', \'search-input-3\', \'\', \'First name:\', \'data-threshold=2, placeholder=Search here ...\');

$src = [\'src\' => \'inc/javascript-plugins/complete.php\'];

$form->addPlugin(\'autocomplete\', \'#search-input-3\', \'ajax\', $src);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));


/*----------  example 4 ----------*/

$form_id = 'plugins-search-form-4';

$form = new Form($form_id);

$addon = '<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>';
$form->addAddon('search-input-4', $addon, 'after');
$form->addHelper('Type at lease 2 characters', 'search-input-4');
$form->addInput('search', 'search-input-4', '', 'First name:', 'data-multiple-choices=true, data-threshold=2, placeholder=Search here ...');

$src = ['src' => 'inc/javascript-plugins/complete.php'];

$form->addPlugin('autocomplete', '#search-input-4', 'ajax', $src);

$output['title'][]     = 'Autocomplete with Multiple choices &amp; Ajax search';
$output['subtitle'][]  = '';
$output['form_code'][] = htmlspecialchars('$form = new Form(\'' . $form_id . '\');

$addon = \'<button class="btn btn-success" type="button">
    <i class="bi bi-search" aria-hidden="true"></i>
</button>\';
$form->addAddon(\'search-input-4\', $addon, \'after\');
$form->addHelper(\'Type at lease 2 characters\', \'search-input-4\');
$form->addInput(\'search\', \'search-input-4\', \'\', \'First name:\', \'data-multiple-choices=true, data-threshold=2, placeholder=Search here ...\');

$src = [\'src\' => \'inc/javascript-plugins/complete.php\'];

$form->addPlugin(\'autocomplete\', \'#search-input-4\', \'ajax\', $src);');

$output['form'][]        = $form;
$output['html_code'][]   = trim(htmlspecialchars($form->cleanHtmlOutput($form->html)));

echo renderExample($output);
