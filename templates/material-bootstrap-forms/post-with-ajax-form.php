<?php

use phpformbuilder\Form;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';



/* ==================================================
    1st form - with the formvalidation plugin
================================================== */

// Instanciate with "data-fv-no-auto-submit" to prevent the formvalidation from submitting the form
$form = new Form('post-with-ajax-form', 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#post-with-ajax-form');


$form->startFieldset('Subscribe to our newsletter');

$form->addInput('email', 'user-email', '', 'Your Email', 'required');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Subscribe<i class="fas fa-envelope ml-2"></i>', 'class=btn btn-primary waves-effect waves-light btn-lg, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#post-with-ajax-form');



/* ==================================================
    2nd form - without the formvalidation plugin
================================================== */

$form2 = new Form('post-with-ajax-form-2', 'horizontal', 'novalidate', 'material');
$form2->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#post-with-ajax-form');


$form2->startFieldset('Subscribe to our newsletter');

$form2->addInput('email', 'user-email-2', '', 'Your Email', 'required');
$form2->centerContent();
$form2->addBtn('submit', 'submit-btn-2', 1, 'Subscribe<i class="fas fa-envelope ml-2"></i>', 'class=btn btn-primary waves-effect waves-light btn-lg, data-ladda-button=true, data-style=zoom-in');

$form2->endFieldset();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Newsletter Subscribe Form - Ajax POST - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to POST a form with Ajax and Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/post-with-ajax-form.php" />

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
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Newsletter Subscribe Form<br><small>posted with Ajax</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <h2 class="h3 mb-5">1st form - posted with Ajax<br><small class="text-secondary">with the formvalidation plugin</small></h2>
                <div id="ajax-response"></div>
                <?php
                // 1st form
                $form->render();
                ?>

                <hr class="my-5">

                <h2 class="h3 mb-5">2nd form - posted with Ajax<br><small class="text-secondary">without the formvalidation plugin</small></h2>
                <div id="ajax-response-2"></div>
                <?php
                // 2nd form
                $form2->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Ajax form loader -->

    <script src="../../phpformbuilder/plugins/ajax-data-loader/ajax-data-loader.min.js"></script>
    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    $form2->printJsCode();
    ?>
    <script>
        /* 1st form - with the formvalidation plugin
        -------------------------------------------------- */

        var fvCallback = function() {
            var form = forms['post-with-ajax-form'];
            // form.fv is the validator
            // you can then use the formvalidation plugin API
            form.fv.on('core.form.valid', function() {
                const $form = document.getElementById('post-with-ajax-form');
                let data = new FormData($form);
                fetch('ajax-forms/post-with-ajax-form.php', {
                    method: 'post',
                    body: new URLSearchParams(data).toString(),
                    headers: {
                        'Content-type': 'application/x-www-form-urlencoded; charset=utf-8'
                    },
                    cache: 'no-store',
                    credentials: 'include'
                }).then(function(response) {
                    return response.text()
                }).then(function(data) {
                    data = JSON.parse(data);
                    if (data.hasError) {
                        // if any error we reload the page to refresh the form
                        // errors have been registered in PHP SESSION by PHP Form Builder
                        location.reload();
                    }
                    // else we show the message in the target div
                    let $ajaxContainer = document.getElementById('ajax-response');
                    $ajaxContainer.innerHTML = data.msg;
                    // & reset the form
                    form.fv.resetForm();
                    document.getElementById('post-with-ajax-form').reset();
                    document.querySelector('button[name="submit-btn"]').removeAttribute('data-loading');
                }).catch(function(error) {
                    console.log(error);
                });
                return false;
            });
        };
    </script>

    <script>
        /* 2nd form - without the formvalidation plugin
        -------------------------------------------------- */

        document.addEventListener('DOMContentLoaded', function() {
            const $form2 = document.getElementById('post-with-ajax-form-2');
            $form2.addEventListener('submit', function(e) {
                e.preventDefault();
                let data = new FormData($form2);
                fetch('ajax-forms/post-with-ajax-form-2.php', {
                    method: 'post',
                    body: new URLSearchParams(data).toString(),
                    headers: {
                        'Content-type': 'application/x-www-form-urlencoded; charset=utf-8'
                    },
                    cache: 'no-store',
                    credentials: 'include'
                }).then(function(response) {
                    return response.text()
                }).then(function(data) {
                    data = JSON.parse(data);
                    document.querySelector('button[name="submit-btn-2"]').removeAttribute('data-loading');
                    if (data.hasError) {
                        // if any error we reload the page to refresh the form
                        // errors have been registered in PHP SESSION by PHP Form Builder
                        location.reload();
                    }
                    // else we show the message in the target div
                    let $ajaxContainer = document.getElementById('ajax-response-2');
                    $ajaxContainer.innerHTML = data.msg;
                    // & reset the form
                    $form2.reset();
                    // & reset the form
                    if ($form2.querySelector('.is-invalid')) {
                        $form2.querySelector('.is-invalid').classList.remove('is-invalid');
                    }
                    if ($form2.querySelector('.invalid-feedback')) {
                        $form2.querySelector('.invalid-feedback').classList.remove('invalid-feedback');
                    }
                }).catch(function(error) {
                    console.log(error);
                });
            });

            return false;
        });
    </script>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>