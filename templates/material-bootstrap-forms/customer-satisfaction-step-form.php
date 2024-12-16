<?php

use phpformbuilder\Form;

/*=============================================
=                Instructions                 =
=============================================*

This file loads and posts the forms with Ajax from and to 'customer-satisfaction-step-form/cs-steps.php'.

It contains:
------------
- the 'cs-step-plugins-loader' form, which is used to load the CSS and Javascript dependencies of the plugins used during the different steps

- the style for the display of the different steps in slides

- the HTML structure that will receive the forms

- the Javascript code used to load & post the forms.

Please see the following comments and just follow the instructions.

*=========  End of Instructions  ===========*/

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

// Define the total number of steps here
define('NUMBER_OF_STEPS', 5);

// Create a form to load the plugins CSS & JS files for all the steps
$form = new Form('cs-step-plugins-loader', 'horizontal', 'novalidate', 'material');
$form->setMode('development');

// materialize plugin
$form->addPlugin('materialize', '#customer-satisfaction-step-form');

$form->addPlugin('slimselect', '#ajax-form');
$form->addPlugin('ladda', 'button[data-ladda-button="true"]');
$form->addPlugin('pretty-checkbox', '#ajax-form');
$form->addPlugin('formvalidation', '#ajax-form');

// Utility functions to extract the content retrieved with fetch() then run the built-in scripts
$form->addPlugin('ajax-data-loader', '#cs-step-plugins-loader');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Bootstrap Customer Satisfaction Step Form - How to create PHP forms easily</title>
    <meta name="description" content="Material Bootstrap Form Generator - how to create a Customer Satisfaction Step Form with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-bootstrap-forms/customer-satisfaction-step-form.php" />

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
    <!-- Loading plugins CSS for all steps -->
    <?php $form->printIncludes('css'); ?>
    <!-- Required style for the display of the different steps in slides -->
    <style>
        #ajax-form {
            width: 100%;
            min-height: 550px;
            overflow: hidden;
        }

        <?php echo '#slide {
            width:' . 100 * NUMBER_OF_STEPS . '%;
        }

        .step {
            float: left;
            width:' . 100 / NUMBER_OF_STEPS . '%;
        }'; ?>

        .step:not(#step-1) {
            opacity: 0;
        }

        #step-form-legend {
            text-align: center;
        }

        #step-counter {
            display: flex;
            justify-content: center;
            margin: 1rem auto;
        }

        #step-counter span {
            display: inline-block;
            height: 1rem;
            width: 1rem;
            margin: .5rem;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.2);
        }

        #step-counter span.is-active {
            background: rgba(0, 0, 0, 0.4);
            background: #C20C0C;
        }
    </style>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Customer Satisfaction Step Form<br><small>Step Form with Slide Effect</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-bootstrap-forms-notice.php';
        ?>

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                ?>
                <legend id="step-form-legend">Customer Satisfaction Slide Step Form</legend>

                <!-- HTML structure that will receive the forms -->

                <div id="step-counter">
                    <span class="is-active"></span>
                    <?php
                    for ($i = 1; $i < NUMBER_OF_STEPS; $i++) {
                        echo '<span></span>';
                    }
                    ?>
                </div>

                <div id="ajax-form">
                    <div id="slide">
                        <?php
                        for ($i = 1; $i <= NUMBER_OF_STEPS; $i++) {
                            echo '<div class="step" id="step-' . $i . '"></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Loading plugins JS for all steps -->

    <?php $form->printIncludes('js'); ?>

    <script>
        // Replace the formUrl bellow by the url that points to your form.
        const formUrl = 'customer-satisfaction-step-form/cs-steps.php';

        // All the following Javascript code is to be used as is, without any modification.

        const ajaxPostForm = function($form) {
            let data = new FormData($form);
            fetch($form.getAttribute('action'), {
                method: 'post',
                body: new URLSearchParams(data).toString(),
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded'
                },
                cache: 'no-store',
                credentials: 'include'
            }).then(function(response) {
                return response.text()
            }).then(function(data) {
                // console.log(data);
                let doc = parser.parseFromString(data, 'text/html');
                targetIndex = parseInt(doc.querySelector('button[name="submit-btn"]').value);
                loadData(data, '#step-' + targetIndex).then(() => {
                    slideToStep(targetIndex - 1, targetIndex);
                });
            }).catch(function(error) {
                console.log(error);
            });
        }

        const goBack = function($form, targetIndex) {
            fetch($form.getAttribute('action'), {
                method: 'post',
                body: new URLSearchParams({
                    'back_to_step': targetIndex
                }).toString(),
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded'
                },
                cache: 'no-store',
                credentials: 'include'
            }).then(function(response) {
                return response.text()
            }).then(function(data) {
                // console.log(data);
                let doc = parser.parseFromString(data, 'text/html');
                targetIndex = parseInt(doc.querySelector('button[name="submit-btn"]').value);
                loadData(data, '#step-' + targetIndex).then(() => {
                    slideToStep(targetIndex + 1, targetIndex);
                });
            }).catch(function(error) {
                console.log(error);
            });
        }

        const slideToStep = function(fromIndex, toIndex) {
            document.querySelectorAll('#step-counter span').forEach(item => {
                item.classList.remove('is-active');
            });
            document.querySelector('#step-counter span:nth-child(' + toIndex + ')').classList.add('is-active');
            if (fromIndex > 0) {
                document.getElementById('step-' + fromIndex).animate({
                    'opacity': 0
                }, {
                    duration: 600,
                    fill: 'forwards'
                });
            }
            document.getElementById('step-' + toIndex).animate({
                'opacity': 1
            }, {
                duration: 600,
                fill: 'forwards'
            });
            stepWidth = document.getElementById('step-1').offsetWidth;
            document.getElementById('slide').animate({
                marginLeft: (-(stepWidth * (toIndex - 1))) + 'px'
            }, {
                duration: 600,
                fill: 'forwards'
            });
            if (fromIndex > 0) {
                document.getElementById('step-' + fromIndex).animate({
                    'opacity': 0
                }, {
                    duration: 600,
                    fill: 'forwards'
                });
            }
        }

        var fvCallback,
            parser = new DOMParser(),
            stepWidth,
            targetIndex;

        const initFormEvents = function(formId) {
            const $form = document.getElementById(formId);
            if (!$form.classList.contains('form-loaded')) {
                $form.classList.add('form-loaded');

                fvCallback = function() {
                    var form = forms[formId];

                    // form.fv is the Javascript real-time validator
                    // we can then use the formvalidation plugin API
                    form.fv.on('core.form.valid', function() {
                        ajaxPostForm(form.fv.form);
                    });
                };

                var $backButton = document.querySelector('#' + formId + ' button[name="back-btn"]');
                if ($backButton) {
                    $backButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        targetIndex = (parseInt($backButton.value) - 1);
                        goBack($form, targetIndex);
                    });
                }
                window.onresize = function() {
                    stepWidth = document.getElementById('step-1').offsetWidth;
                    document.getElementById('slide').animate({
                        marginLeft: (-(stepWidth * (targetIndex - 1))) + 'px'
                    }, {
                        duration: 0,
                        fill: 'forwards'
                    });
                };
            }
        }

        document.addEventListener('DOMContentLoaded', function(event) {
            fetch(formUrl)
                .then(function(response) {
                    return response.text()
                })
                .then(function(data) {
                    loadData(data, '#step-1');
                }).catch((error) => {
                    console.log(error);
                });
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
