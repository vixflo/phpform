<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('image-picker-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('image-picker-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['image-picker-form'] = $validator->getAllErrors();
    } else {
        // replace images URLs with html img code
        $values = [];
        foreach ($_POST as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $value[$k] = preg_replace('`^https://(.*)`', '<img src="https://$1" />', $v);
                }
                $values[$key] = $value;
            } else {
                $values[$key] = preg_replace('`^https://(.*)`', '<img src="https://$1" />', $value);
            }
        }

        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Selected Images from Php Form Builder',
            'values'          => $values,
            'filter_values'   => 'image-picker-form'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('image-picker-form');
    }
}
$form = new Form('image-picker-form', 'vertical', '', 'tailwind');
$form->setMode('development');

// Single image
$form->startFieldset('Single image select', '', 'class=text-2xl dark:text-white my-6');
for ($i = 0; $i < 10; $i++) {
    $form->addOption('animal', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/animals-' . $i . '.jpg', '', '', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/animals-' . $i . '.jpg, data-img-alt=Animal ' . $i);
}
$form->addSelect('animal', 'Choose your preferred animal', 'required');
$form->endFieldset();

// Multiple select
$form->startFieldset('Multiple select', '', 'class=text-2xl dark:text-white my-6');
$form->addHelper('Multiple choices', 'landscapes');
for ($i = 0; $i < 10; $i++) {
    $form->addOption('landscapes[]', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/landscapes/landscape-' . $i . '.jpg', '', '', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/landscapes/landscape-' . $i . '.jpg, data-img-alt=Landscape ' . $i);
}
$form->addSelect('landscapes[]', 'Choose your preferred landscapes', 'multiple, required');
$form->endFieldset();

// Multiple select with limit
$form->startFieldset('Multiple select with limit', '', 'class=text-2xl dark:text-white my-6');
$form->addHelper('Maximum 2', 'cities');
for ($i = 0; $i < 10; $i++) {
    $form->addOption('cities[]', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/cities/city-' . $i . '.jpg', '', '', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/cities/city-' . $i . '.jpg, data-img-alt=City image ' . $i);
}
$form->addSelect('cities[]', 'Choose your preferred cities', 'multiple, data-limit=2, required');
$form->endFieldset();

// Single image with labels
$form->startFieldset('Single image with labels', '', 'class=text-2xl dark:text-white my-6');
for ($i = 0; $i < 10; $i++) {
    $form->addOption('single-image', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/sports/sport-' . $i . '.jpg', '', '', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/sports/sport-' . $i . '.jpg, data-img-label=Sport ' . $i . ', data-img-alt=Sport' . $i);
}
$form->addSelect('single-image', 'Choose your favourite sport', 'class=show_label, required');
$form->endFieldset();

// Single image with  grouped options
$form->startFieldset('Single image with grouped options', '', 'class=text-2xl dark:text-white my-6');
for ($i = 0; $i < 5; $i++) {
    $form->addOption('animal-2', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/cats/cat-' . $i . '.jpg', '', 'Cats', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/cats/cat-' . $i . '.jpg, data-img-alt=Cat ' . $i);
}
for ($i = 0; $i < 5; $i++) {
    $form->addOption('animal-2', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/dogs/dog-' . $i . '.jpg', '', 'Dogs', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/dogs/dog-' . $i . '.jpg, data-img-alt=Dog ' . $i);
}
for ($i = 0; $i < 5; $i++) {
    $form->addOption('animal-2', 'https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/animals-' . $i . '.jpg', '', 'Other animals', 'data-img-src=https://www.phpformbuilder.pro/templates/assets/img/random-images/animals/animals-' . $i . '.jpg, data-img-alt=Others ' . $i);
}
$form->addSelect('animal-2', 'Choose your preferred animal', 'required');
$form->endFieldset();

$form->addInput('email', 'user-email', '', 'Your Email', 'placeholder=Email, required');

$form->addBtn('button', 'cancel', 0, 'Cancel', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:focus:ring-amber-900', 'btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800', 'btn-group');
$form->printBtnGroup('btn-group');

// image picker plugin
$form->addPlugin('image-picker', 'select');

// Javascript validation
$form->addPlugin('formvalidation', '#image-picker-form');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Image picker Form - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to create an Image picker Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/image-picker-form.php" />

    <!-- Tailwind CSS - for demo purposes only - replace with your Tailwind compilation -->

    <script src="https://cdn.tailwindcss.com"></script>

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

    <h1 class="text-center">Tailwind Image picker Form<br><small>with Image picker plugin</small></h1>

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <div class="text-center mb-10">
                <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#image-picker-example" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900 btn-sm"><strong>Image picker plugin</strong> - documentation here <i class="fas fa-arrow-right ml-4"></i></a>
            </div>
            <?php
            if (isset($sentMessage)) {
                echo $sentMessage;
            }
            $form->render();
            ?>
        </div>
    </div>

    <!-- jQuery - required for the image picker plugin -->

    <script src=" https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"> </script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-body.php';
    ?>
</body>

</html>
