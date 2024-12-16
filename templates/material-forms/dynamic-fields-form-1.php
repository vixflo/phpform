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

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('dynamic-fields-form-1') === true) {
    $validator = new Validator($_POST);
    $required = array();

    // create validator & auto-validate required fields
    $validator = Form::validate('dynamic-fields-form-1');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['dynamic-fields-form-1'] = $validator->getAllErrors();
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Dynamic fields Form 1',
            'filter_values'   => 'dynamic-fields-form-1'
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear('dynamic-fields-form-1');
    }
}

// hidden field value to count posted jobs
if (!isset($_SESSION['dynamic-fields-form-1']['job-count'])) {
    $_SESSION['dynamic-fields-form-1']['job-count'] = 1;
}

/* ==================================================
    The Form
================================================== */

$form = new Form('dynamic-fields-form-1', 'horizontal', 'novalidate', 'material');
$form->setMode('development');
$form->setCols(2, 10, 'md');
$form->addInput('email', 'user-email', '', 'Your email', 'placeholder=Email, required');
$form->setCols(2, 4, 'md');
$form->groupElements('job-1', 'person-1');
$form->addOption('job-1', 'Content writer', 'Content writer');
$form->addOption('job-1', 'Tech Support / Technical Leader', 'Tech Support / Technical Leader');
$form->addOption('job-1', 'Office Assistant', 'Office Assistant');
$form->addOption('job-1', 'Secretary', 'Secretary');
$form->addOption('job-1', 'Team Leader', 'Team Leader');
$form->addOption('job-1', 'Data Analyst', 'Data Analyst');
$form->addOption('job-1', 'Safety Officer', 'Safety Officer');
$form->addOption('job-1', 'Delivery Boy', 'Delivery Boy');
$form->addOption('job-1', 'Admin Assistant', 'Admin Assistant');
$form->addSelect('job-1', 'Job 1', 'data-slimselect=true, class=job, title=Select a Job ..., required');
$form->addOption('person-1', 'Adam Bryant', 'Adam Bryant');
$form->addOption('person-1', 'Lillian Riley', 'Lillian Riley');
$form->addOption('person-1', 'Paula Day', 'Paula Day');
$form->addOption('person-1', 'Kelly Stephens', 'Kelly Stephens');
$form->addOption('person-1', 'Russell Hawkins', 'Russell Hawkins');
$form->addOption('person-1', 'Carl Watson', 'Carl Watson');
$form->addOption('person-1', 'Judith White', 'Judith White');
$form->addOption('person-1', 'Tina Cook', 'Tina Cook');
$form->addSelect('person-1', 'Person 1', 'data-slimselect=true, class=person, title=Select a Person ..., required');
$form->addHtml('<div id="ajax-elements-container"></div>');

// hidden field to count posted jobs
$form->addInput('hidden', 'job-count', '');

// buttons add/remove
$form->setCols(0, 12);
$options = array(
    'btnGroupClass' => 'btn-group right-align'
);
$form->setOptions($options);
$form->addBtn('button', 'remove-btn', 0, 'Remove Element', 'class=btn orange darken-1 waves-effect waves-light remove-element-button, style=visibility:hidden, data-ladda-button=true, data-style=zoom-in', 'add-remove-group');
$form->addBtn('button', 'add-element', 1, 'Add Element', 'class=btn waves-effect waves-light right add-element-button, data-ladda-button=true', 'add-remove-group');
$form->printBtnGroup('add-remove-group');

// cancel/submit
$options = array(
    'btnGroupClass' => 'btn-group'
);
$form->setOptions($options);
$form->centerContent();
$form->addBtn('button', 'cancel', 0, 'Cancel', 'class=btn orange darken-1 waves-effect waves-light', 'btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn waves-effect waves-light, data-ladda-button=true, data-style=zoom-in', 'btn-group');
$form->printBtnGroup('btn-group');


// Utility functions to extract the content retrieved with fetch() then run the built-in scripts
$form->addPlugin('ajax-data-loader', '#movies-form');

// Javascript validation
$form->addPlugin('formvalidation', '#dynamic-fields-form-1');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material Dynamic fields Form using Ajax - How to create PHP forms easily</title>
    <meta name="description" content="Material Form Generator - how to create a Php Form with Ajax dynamic fields using Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/material-forms/dynamic-fields-form-1.php" />

    <!-- Materialize CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material icons CSS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php

    /* =============================================
            CODE PREVIEW - REMOVE THIS IN YOUR FORMS
        ============================================= */

    include_once '../assets/code-preview-head.php';
    ?>
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Form with Ajax Dynamic fields<br><small>click "Add Element" button</small></h1>

    <div class="container">
        <?php
        // information for users - remove this in your forms
        include_once '../assets/material-forms-notice.php';
        ?>

        <div class="row">

            <div class="col m11 l10">
                <?php
                if (isset($sentMessage)) {
                    echo $sentMessage;
                }
                $form->render();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Materialize JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit(document.querySelector('#dynamic-fields-form-1'));
        });
    </script>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        var addElement = function() {

            // fetch the new elements
            let data = {
                'job-index': parseInt(document.querySelector('input[name="job-count"]').value) + 1
            };
            fetch('dynamic-fields-form-1/ajax-elements.php', {
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
                loadData(data, '#ajax-elements-container', true).then(() => {
                    setTimeout(() => {
                        Ladda.stopAll();

                        // increment job-count
                        var newIndex = parseInt(document.querySelector('input[name="job-count"]').value) + 1;
                        document.querySelector('input[name="job-count"]').value = newIndex;

                        // enable validator for the new fields
                        var form = forms['dynamic-fields-form-1'];
                        form.fv.addField(
                            'job-' + newIndex, {
                                validators: {
                                    notEmpty: {}
                                }
                            }
                        );
                        form.fv.addField(
                            'person-' + newIndex, {
                                validators: {
                                    notEmpty: {}
                                }
                            }
                        );

                        // trigger each element on page load
                        if (newIndex < <?php echo $_SESSION['dynamic-fields-form-1']['job-count']; ?>) {
                            addElement();
                        }

                        // show remove button if more than 1 job selector
                        if (parseInt(document.querySelectorAll('select.job').length) > 1) {
                            document.querySelector('.remove-element-button').style.visibility = 'visible';
                        }
                    }, 200);
                });
            }).catch(function(error) {
                console.log(error);
            });
        };
        document.addEventListener('DOMContentLoaded', function(event) {
            document.querySelector('.add-element-button').addEventListener('click', addElement);
            document.querySelector('.remove-element-button').addEventListener('click', function() {
                let nodes = document.querySelectorAll('#ajax-elements-container .row');
                let last = nodes[nodes.length - 1];
                last.parentNode.removeChild(last);

                // decrement job-count
                document.querySelector('input[name="job-count"]').value = parseInt(document.querySelector('input[name="job-count"]').value) - 1;

                // hide remove button if only 1 job selector
                if (parseInt(document.querySelectorAll('select.job').length) < 2) {
                    document.querySelector('.remove-element-button').style.visibility = 'hidden';
                }

                // Ajax call to unset removed fields from form required fields
                let data = {
                    'job-index': parseInt(document.querySelector('input[name="job-count"]').value) + 1
                };
                fetch('dynamic-fields-form-1/unset-ajax-elements.php', {
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
                    Ladda.stopAll();
                    // remove validator for the removed fields
                    let newIndex = parseInt(document.querySelector('input[name="job-count"]').value) + 1;

                    var form = forms['dynamic-fields-form-1'];

                    form.fv.removeField('job-' + newIndex);
                    form.fv.removeField('person-' + newIndex);
                }).catch(function(error) {
                    console.log(error);
                });
            });
            <?php if ($_SESSION['dynamic-fields-form-1']['job-count'] > 1) { ?>
                document.querySelector('input[name="job-count"]').value = 1;
                addElement();
            <?php } ?>
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
