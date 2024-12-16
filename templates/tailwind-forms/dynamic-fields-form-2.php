<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

// define the form name globally
$formId = 'dynamic-fields-form-2';

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken($formId) === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate($formId);

    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors'][$formId] = $validator->getAllErrors();

        // register errors in a custom session variable to transmit to ajax dynamic form
        // because errors will be registered & cleared when we construct the form
        $_SESSION['ajax-errors'][$formId] = $_SESSION['errors'][$formId];
        var_dump($_SESSION['ajax-errors']);
    } else {
        $emailConfig = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Dynamic fields Form 2',
            'filter_values'   => $formId
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear($formId);
        if (isset($_SESSION['ajax-errors'][$formId])) {
            unset($_SESSION['ajax-errors'][$formId]);
        }
    }
}

// clear dynamic errors on page load
if ($_SERVER["REQUEST_METHOD"] !== "POST" && isset($_SESSION['ajax-errors'][$formId])) {
    unset($_SESSION['ajax-errors'][$formId]);
}

/* ==================================================
    The Form
================================================== */

$form = new Form($formId, 'horizontal', 'novalidate', 'tailwind');
$form->setMode('development');

$form->setCols(2, 8, 'md');
$form->addInput('email', 'user-email', '', 'Your email', 'placeholder=Email, required');
$form->setCols(2, 3, 'md');

$form->groupElements('job-1', 'person-1');

$form->addOption('job-1', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('job-1', 'Content writer', 'Content writer');
$form->addOption('job-1', 'Tech Support / Technical Leader', 'Tech Support / Technical Leader');
$form->addOption('job-1', 'Office Assistant', 'Office Assistant');
$form->addOption('job-1', 'Secretary', 'Secretary');
$form->addOption('job-1', 'Team Leader', 'Team Leader');
$form->addOption('job-1', 'Data Analyst', 'Data Analyst');
$form->addOption('job-1', 'Safety Officer', 'Safety Officer');
$form->addOption('job-1', 'Delivery Boy', 'Delivery Boy');
$form->addOption('job-1', 'Admin Assistant', 'Admin Assistant');
$form->addSelect('job-1', 'Job', 'data-slimselect=true, class=job, required');

$form->addOption('person-1', '', 'Choose one ...', '', 'disabled selected');
$form->addOption('person-1', 'Adam Bryant', 'Adam Bryant');
$form->addOption('person-1', 'Lillian Riley', 'Lillian Riley');
$form->addOption('person-1', 'Paula Day', 'Paula Day');
$form->addOption('person-1', 'Kelly Stephens', 'Kelly Stephens');
$form->addOption('person-1', 'Russell Hawkins', 'Russell Hawkins');
$form->addOption('person-1', 'Carl Watson', 'Carl Watson');
$form->addOption('person-1', 'Judith White', 'Judith White');
$form->addOption('person-1', 'Tina Cook', 'Tina Cook');
$form->addSelect('person-1', 'Person', 'data-slimselect=true, class=person, required');

// Dynamic fields - container + add button

$form->addHtml('<div id="ajax-elements-container"></div>');
$form->addHtml('<div class="row"><div class="col-md-2"><p>&nbsp;</p></div>');
$form->addHtml('<div class="col-md-3"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 add-element-button"><i class="fas fa-plus-circle" aria-hidden="true"></i></button><p>&nbsp;</p></div>');
$form->addHtml('</div>');

// End Dynamic fields

// cancel/submit
$form->setCols(0, 12);
$form->centerContent();
$form->addBtn('button', 'cancel', 0, 'Cancel', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-8 dark:focus:ring-amber-900', 'btn-group');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'btn-group');
$form->printBtnGroup('btn-group');

// Utility functions to extract the content retrieved with fetch() then run the built-in scripts
$form->addPlugin('ajax-data-loader', '#' . $formId);

// Javascript validation
$form->addPlugin('formvalidation', '#' . $formId);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailwind Php Form with Ajax dynamic fields - How to create PHP forms easily</title>
    <meta name="description" content="Tailwind Form Generator - how to load dynamic fields on the fly with Php Form Builder">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/tailwind-forms/dynamic-fields-form-2.php" />

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

    <h1 class="text-center">Php Form Builder - Form with dynamic ajax-loaded fields<br><small>Click "+" or "-" buttons to add or remove fields</small></h1>

    <div class="container mx-auto md:px-5 lg:px-10 xl:px-48">
        <div class="grid-cols-1">
            <?php
            if (isset($sentMessage)) {
                echo $sentMessage;
            }
            $form->render();
            ?>
        </div>
    </div>

    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>
    <script>
        /* =============================================
            Dynamic fields standard code
            (No need to touch anything here)
        ============================================= */

        document.addEventListener('DOMContentLoaded', function(event) {
            const form = forms['<?php echo $formId; ?>'];

            const dfIndexInput = document.createElement('input');
            dfIndexInput.setAttribute('type', 'hidden');
            dfIndexInput.setAttribute('name', 'dynamic-fields-index');
            dfIndexInput.value = 1;
            let parent = document.getElementById('ajax-elements-container').closest('form');
            parent.insertBefore(dfIndexInput, parent.firstChild);

            // first dynamic index is "1"
            var firstDynamicIndex = 1,
                postedDynamicIndex = 0,
                loadPostedDynamicFields = true;

            const countInput = document.querySelector('input[name="dynamic-fields-index"]');
            var dfIndex = parseInt(countInput.value);

            // hidden field to store dynamic fields index

            document.querySelector('.add-element-button').addEventListener('click', function() {

                // increment index & dynamic-fields-index
                dfIndex++;
                countInput.value = dfIndex;

                let data = {
                    index: dfIndex
                };
                fetch('<?php echo $formId; ?>/dynamic-elements.php', {
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
                        // enable validator for the new fields
                        form.fv.addField(
                            'job-' + dfIndex, {
                                validators: {
                                    notEmpty: {}
                                }
                            }
                        );
                        form.fv.addField(
                            'person-' + dfIndex, {
                                validators: {
                                    notEmpty: {}
                                }
                            }
                        );

                        document.querySelector('select[name="job-' + dfIndex + '"]').addEventListener('change', function() {
                            form.fv.revalidateField('job-' + dfIndex);
                        });

                        document.querySelector('select[name="person-' + dfIndex + '"]').addEventListener('change', function() {
                            form.fv.revalidateField('person-' + dfIndex);
                        });

                        // load posted dynamic fields
                        if (loadPostedDynamicFields === true && postedDynamicIndex > dfIndex) {
                            setTimeout(function() {
                                const evt = new Event('click', {
                                    bubbles: true
                                });
                                document.querySelector('.add-element-button').dispatchEvent(evt);
                            }, 100);
                        } else {
                            // all posted fields loaded
                            loadPostedDynamicFields = false;
                        }

                        // Remove action
                        // Array.from(document.querySelectorAll('.remove-element-button')).pop().closest('.dynamic')
                        const lastRemoveBtn = Array.from(document.querySelectorAll('.remove-element-button')).pop();
                        lastRemoveBtn.classList.remove('hidden');
                        lastRemoveBtn.addEventListener('click', function(e) {
                            let btnTarget = e.target;
                            if (btnTarget.nodeName !== 'BUTTON') {
                                btnTarget = btnTarget.closest('button');
                            }
                            var currentIndex = parseInt(btnTarget.dataset.index); // index of removed dynamic
                            // Transfer upper dynamics values to each previous
                            var transferUpperValues = function() {
                                var previousDynamic = document.querySelector('.dynamic[data-index="' + (currentIndex) + '"]');
                                var previousFields = previousDynamic.querySelectorAll('input, textarea, select, radio, checkbox');
                                previousFields.forEach((field, i) => {
                                    if (field.dataset.activates === undefined) { // specific condition for material select
                                        var followingField = '',
                                            newValue = '';
                                        if (field.tagName === 'INPUT' && field.type === 'RADIO') {
                                            var followingFieldName = field.getAttribute('name').replace('-' + parseInt(currentIndex), '-' + parseInt(currentIndex + 1));
                                            followingField = document.querySelector('input[name="' + followingFieldName + '"]:checked');
                                            newValue = followingField.value;
                                            if (field.value == newValue) {
                                                field.checked = true;
                                            } else {
                                                field.checked = false;
                                            }
                                        } else {
                                            var followingFieldId = field.id.replace('-' + parseInt(currentIndex), '-' + parseInt(currentIndex + 1));
                                            followingField = document.getElementById(followingFieldId);
                                            if (followingField !== null) {
                                                if (field.tagName === 'SELECT') {
                                                    newValue = followingField.querySelector('option:checked').value;
                                                } else {
                                                    newValue = followingField.value;
                                                }
                                                if (field.dataset.ssid !== undefined) {
                                                    // slimselect value
                                                    window.slimSelects[field.id].set(newValue);
                                                } else {
                                                    field.value = newValue;
                                                }
                                            }
                                        }
                                    }
                                });
                            };

                            // if upper dynamic sections
                            var upperIndex = currentIndex - firstDynamicIndex;
                            var dynamicFields = document.querySelectorAll('.dynamic');
                            var dynamicFieldsArray = Object.keys(dynamicFields).map((key) => [Number(key), dynamicFields[key]]);
                            if (dynamicFieldsArray[upperIndex]) {
                                while (dynamicFieldsArray[upperIndex] !== undefined) {
                                    transferUpperValues();
                                    currentIndex++;
                                    upperIndex++;
                                }
                            }

                            // Ajax call to unset removed fields from form required fields
                            let data = {
                                'index': dfIndex
                            };
                            fetch('<?php echo $formId; ?>/unset-ajax-elements.php', {
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
                                form.fv.removeField('job-' + (dfIndex + 1));
                                form.fv.removeField('person-' + (dfIndex + 1));
                            }).catch(function(error) {
                                console.log(error);
                            });

                            // decrement dynamic-fields-index
                            dfIndex -= 1;
                            countInput.value = dfIndex;

                            // remove last dynamic container
                            Array.from(document.querySelectorAll('.remove-element-button')).pop().closest('.dynamic').remove();
                        });
                    });
                }).catch(function(error) {
                    console.log(error);
                });
            });

            // reload posted fields
            <?php
            $index = 1;
            if (isset($_POST['dynamic-fields-index']) && isset($_SESSION['ajax-errors'][$formId])) {
                $index = $_POST['dynamic-fields-index'];
            }
            if ($index > 1) {
            ?> postedDynamicIndex = <?php echo $index; ?>;
                setTimeout(function() {
                    const evt = new Event('click', {
                        bubbles: true
                    });
                    document.querySelector('.add-element-button').dispatchEvent(evt);
                }, 200);
            <?php
            } // end if
            ?> document.querySelector('select[name="job-' + dfIndex + '"]').addEventListener('change', function() {
                form.fv.revalidateField(this.name);
            });

            document.querySelector('select[name="person-' + dfIndex + '"]').addEventListener('change', function() {
                form.fv.revalidateField(this.name);
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
