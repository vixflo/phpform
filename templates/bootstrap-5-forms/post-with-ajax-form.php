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
$form = new Form('post-with-ajax-form', 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'bs5');
$form->setMode('development');

$form->startFieldset('Subscribe to our newsletter', '', 'class=text-center mb-4');

$form->addInput('email', 'user-email', '', 'Your Email', 'required');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Subscribe<i class="bi bi-envelope-fill ms-2"></i>', 'class=btn btn-primary btn-lg, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

// Javascript validation
$form->addPlugin('formvalidation', '#post-with-ajax-form');



/* ==================================================
    2nd form - without the formvalidation plugin
================================================== */

$form2 = new Form('post-with-ajax-form-2', 'horizontal', 'novalidate', 'bs5');
$form2->setMode('development');

$form2->startFieldset('Subscribe to our newsletter', '', 'class=text-center mb-4');

$form2->addInput('email', 'user-email-2', '', 'Your Email', 'required');
$form2->centerContent();
$form2->addBtn('submit', 'submit-btn-2', 1, 'Subscribe<i class="bi bi-envelope-fill ms-2"></i>', 'class=btn btn-primary btn-lg, data-ladda-button=true, data-style=zoom-in');

$form2->endFieldset();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Newsletter Subscribe Form - Ajax POST - How to create PHP forms easily</title>
    <meta name="description" content="Bootstrap 5 Form Generator - how to POST a form with Ajax and Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/post-with-ajax-form.php" />

    <!-- Bootstrap 5 CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    <!-- Bootstrap 5 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
