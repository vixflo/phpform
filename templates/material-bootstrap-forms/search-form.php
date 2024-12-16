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

$form = new Form('search-form-1', 'vertical', 'class=mb-5, novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#search-form-1');


$form->startFieldset('1<sup>st</sup> Search Form - search in json list');

$addon = '<button class="btn btn-primary waves-effect waves-light" data-ladda-button=true" data-style="zoom-in" type="submit"><i class="fas fas fa-search" aria-hidden="true"></i></button>';
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

$form_2 = new Form('search-form-2', 'vertical', 'novalidate', 'material');
$form_2->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#search-form-1');


$form_2->startFieldset('2<sup>nd</sup> Search Form - search with ajax request');

$addon = '<button class="btn btn-primary waves-effect waves-light" data-ladda-button="true" data-style="zoom-in" type="submit"><i class="fas fas fa-search" aria-hidden="true"></i></button>';
$form_2->addAddon('search-input-2', $addon, 'after');
$form_2->addHelper('Type at least 2 characters', 'search-input-2');
$form_2->addInput('text', 'search-input-2', '', 'First name:', 'data-threshold=2, placeholder=Search here ...');

$form_2->endFieldset();

$src = ['src' => 'search-form-autocomplete/complete.php'];

$form_2->addPlugin('autocomplete', '#search-input-2', 'ajax', $src);

$form_2->addPlugin('ladda', '#search-form-2 button');

/* 3rd form (Ajax search with select multiple & tags) */

$form_3 = new Form('search-form-3', 'vertical', 'novalidate', 'material');
$form_3->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#search-form-1');


$form_3->startFieldset('3<sup>rd</sup> Search Form - Ajax search with multiple tags results');

$addon = '<button class="btn btn-primary waves-effect waves-light" data-ladda-button="true" data-style="zoom-in" type="submit"><i class="fas fas fa-search" aria-hidden="true"></i></button>';
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
    <title>Material Bootstrap Autocomplete Search Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create an autocompleting Search Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/search-form.php" />

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
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

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <div class="text-center mb-5">
                    <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#autocomplete-example" class="btn btn-secondary btn-sm"><strong>Autocomplete plugin</strong> - documentation here <i class="fas fa-arrow-right ml-2"></i></a>
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

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
