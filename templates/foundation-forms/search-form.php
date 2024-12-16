<?php

use phpformbuilder\Form;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check which form has been posted

    if (isset($_POST['search-form-1']) && Form::testToken('search-form-1') === true) {
        Form::clear('search-form-1');
    } elseif (isset($_POST['search-form-2']) && Form::testToken('search-form-2') === true) {
        Form::clear('search-form-2');
    } elseif (isset($_POST['search-form-3']) && Form::testToken('search-form-3') === true) {
        Form::clear('search-form-3');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('search-form-1', 'vertical', 'class=, novalidate', 'foundation');
$form->setMode('development');

$form->startFieldset('1<sup>st</sup> Search Form - search in json list', '', 'class=h4 text-center');

$addon = '<button class="button primary" data-ladda-button=true" data-style="zoom-in" type="submit"><i class="fi-magnifying-glass" aria-hidden="true"></i></button>';
$form->addAddon('search-input-1', $addon, 'after');
$form->addHelper('Type for example "A"', 'search-input-1');
$form->addInput('text', 'search-input-1', '', 'Search something:', 'placeholder=Search here ...');

$form->endFieldset();

$src = [
    'src' => ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"]
];
$form->addPlugin('autocomplete', '#search-input-1', 'default', $src);

$form->addPlugin('ladda', '#search-form-1 button');

/* 2nd form (Ajax search) */

$form_2 = new Form('search-form-2', 'vertical', 'novalidate', 'foundation');
$form_2->setMode('development');

$form_2->startFieldset('2<sup>nd</sup> Search Form - search with ajax request', '', 'class=h4 text-center');

$addon = '<button class="button primary" data-ladda-button="true" data-style="zoom-in" type="submit"><i class="fi-magnifying-glass" aria-hidden="true"></i></button>';
$form_2->addAddon('search-input-2', $addon, 'after');
$form_2->addHelper('Type at least 2 characters', 'search-input-2');
$form_2->addInput('text', 'search-input-2', '', 'First name:', 'data-threshold=2, placeholder=Search here ...');

$form_2->endFieldset();

$src = ['src' => 'search-form-autocomplete/complete.php'];

$form_2->addPlugin('autocomplete', '#search-input-2', 'ajax', $src);

$form_2->addPlugin('ladda', '#search-form-2 button');

/* 3rd form (Ajax search with select multiple & tags) */

$form_3 = new Form('search-form-3', 'vertical', 'novalidate', 'foundation');
$form_3->setMode('development');

$form_3->startFieldset('3<sup>rd</sup> Search Form - Ajax search with multiple tags results', '', 'class=h4 text-center');

$addon = '<button class="button primary" data-ladda-button="true" data-style="zoom-in" type="submit"><i class="fi-magnifying-glass" aria-hidden="true"></i></button>';
$form_3->addAddon('search-input-3', $addon, 'after');
$form_3->addHelper('Type at least 2 characters', 'search-input-3');
$form_3->addInput('text', 'search-input-3', '', 'First name:', 'data-multiple-choices=true, data-placeholder=Search here ...');

$form_3->endFieldset();

$replacements = [
    'remote' => 'search-form-autocomplete/complete.php',
    'minLength' => '2'
];

$form_3->addPlugin('autocomplete', '#search-input-3', 'ajax', $src);

$form_3->addPlugin('ladda', '#search-form-3 button');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foundation Autocomplete Search Form - How to create PHP forms easily</title>
    <meta name="description" content="Foundation Form Generator - how to create an autocompleting Search Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/foundation-forms/search-form.php" />

    <!-- Foundation CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">

    <!-- foundation icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php
    $form->printIncludes('css');
    $form_3->printIncludes('css');
    ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Search Form<br><small>with JSON or Ajax autocomplete</small></h1>

    <div class="grid-container" style="min-width:66vw;">

        <div class="grid-x">

            <div class="cell">
                <div class="text-center">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#autocomplete-example" class="btn button secondary small"><strong>Autocomplete plugin</strong> - documentation here <i class="fi-arrow-right append"></i></a>
                </div>
                <?php
                $form->render();
                $form_2->render();
                $form_3->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Foundation JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js" crossorigin="anonymous"></script>

    <?php
    $form->printIncludes('js');
    $form_3->printIncludes('js');
    $form->printJsCode();
    $form_2->printJsCode();
    $form_3->printJsCode();
    ?>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
