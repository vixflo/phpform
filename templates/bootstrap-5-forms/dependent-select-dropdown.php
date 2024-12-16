<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('movies-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('movies-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['movies-form'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Message from phpformbuilder.pro',
            'filter_values'   => 'token, submit-btn'
        );
        $sentMessage = Form::sendMail($emailConfig);
    }
}

// values for demo
$categories = array(
    'Action',
    'Adventure',
    'Animation',
    'Comedy',
    'Documentary',
    'Drama',
    'Horror',
    'Mystery',
    'Thriller',
    'War'
);

$form = new Form('movies-form', 'vertical', 'novalidate', 'bs5');
$form->setMode('development');
$form->startFieldset('Choose a movie category', '', 'class=text-center mb-4');

foreach ($categories as $cat) {
    $form->addOption('category', $cat, $cat);
}
$form->addSelect('category', 'Categories', 'data-slimselect=true, required');

// create a div with an id to retrieve the dependent select box with Ajax
$form->addHtml('<div id="movies">&nbsp;</div>');

$form->addInput('email', 'user-email', '', 'Your email : ', 'required');
$form->centerContent();
$form->addBtn('submit', 'submit-btn', 1, 'Submit <i class="bi bi-envelope-fill ms-2" aria-hidden="true"></i>', 'class=btn btn-primary mt-5, data-ladda-button=true, data-style=zoom-in');

$form->endFieldset();

// Utility functions to extract the content retrieved with fetch() then run the built-in scripts
$form->addPlugin('ajax-data-loader', '#movies-form');

// Javascript validation
$form->addPlugin('formvalidation', '#movies-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 5 Form - Dependent Select dropdown form</title>
    <meta name="description" content="Bootstrap 5 Form Generator - Example of dynamic dropdown depending on a main select box">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/dependent-select-dropdown.php" />

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

    <h1 class="text-center">Php Form Builder - Dependent Select dropdown form<br><small>Dynamic dropdown depending on a main select box</small></h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                $form->render();
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
            const $categorisSelect = document.querySelector('select[name="category"]'),
                targetSelector = '#movies';

            $categorisSelect.addEventListener('change', () => {
                let data = {
                    'movie_cat': $categorisSelect.value
                };
                fetch('dependent-select-dropdown-form/ajax-dependent-select-dropdown.php', {
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
                    // load the data with the ajax-data-loader
                    loadData(data, targetSelector);
                }).catch(function(error) {
                    console.log(error);
                });
            });

            // trigger 'change' to load the films for the current category on load
            const evt = new Event('change', {
                bubbles: true
            });
            $categorisSelect.dispatchEvent(evt);
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
