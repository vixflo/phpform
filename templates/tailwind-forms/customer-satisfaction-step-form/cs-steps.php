<?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/*=============================================
=                Instructions                 =
=============================================*

This file contains the forms called with Ajax from '../customer-satisfaction-step-form.php'.

Each step uses its own form.

When a form is posted, the data is validated and recorded with Form::registerValues() and then we go to the next step.

If all the steps are ok an email is sent, we come back to step 1 and we display a message to the user.

The Javascript at the end of the file calls the initFormEvents() function which is in customer-satisfaction-step-form.php and is used to manage the back buttons and post in Ajax.

Important:
----------
The 'submit' buttons must be named 'submit-btn' and have the corresponding step number as their value.

*=========  End of Instructions  ===========*/

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

$currentStep = 1; // default if nothing posted

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back_to_step']) && is_numeric($_POST['back_to_step'])) {
        $currentStep = $_POST['back_to_step'];
    } elseif (isset($_POST['cs-step-1']) && Form::testToken('cs-step-1')) {
        /* Validate step 1 */

        // create validator & auto-validate required fields
        $validator = Form::validate('cs-step-1');
        if ($validator->hasErrors()) {
            $currentStep = 1;
            $_SESSION['errors']['cs-step-1'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('cs-step-1');
            $currentStep = 2;
        }
    } elseif (isset($_POST['cs-step-2']) && Form::testToken('cs-step-2')) {
        /* Validate step 2 */

        // create validator & auto-validate required fields
        $validator = Form::validate('cs-step-2');
        if ($validator->hasErrors()) {
            $currentStep = 2;
            $_SESSION['errors']['cs-step-2'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('cs-step-2');
            $currentStep = 3;
        }
    } elseif (isset($_POST['cs-step-3']) && Form::testToken('cs-step-3')) {
        /* Validate step 3 */

        // create validator & auto-validate required fields
        $validator = Form::validate('cs-step-3');
        if ($validator->hasErrors()) {
            $currentStep = 3;
            $_SESSION['errors']['cs-step-3'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('cs-step-3');
            $currentStep = 4;
        }
    } elseif (isset($_POST['cs-step-4']) && Form::testToken('cs-step-4')) {
        /* Validate step 4 */

        // create validator & auto-validate required fields
        $validator = Form::validate('cs-step-4');
        if ($validator->hasErrors()) {
            $currentStep = 4;
            $_SESSION['errors']['cs-step-4'] = $validator->getAllErrors();
        } else { // register posted values and go to next step
            Form::registerValues('cs-step-4');
            $currentStep = 5;
        }
    } elseif (isset($_POST['cs-step-5']) && Form::testToken('cs-step-5')) {
        /* Validate step 5 */

        // create validator & auto-validate required fields
        $validator = Form::validate('cs-step-5');
        if ($validator->hasErrors()) {
            $currentStep = 5;
            $_SESSION['errors']['cs-step-5'] = $validator->getAllErrors();
        } else { // SEND ALL
            Form::registerValues('cs-step-5');
            $currentStep = 1;

            $values = Form::mergeValues(array('cs-step-1', 'cs-step-2', 'cs-step-3', 'cs-step-4', 'cs-step-5'));
            $emailConfig = array(
                'sender_email'    => 'contact@phpformbuilder.pro',
                'sender_name'     => 'Php Form Builder',
                'recipient_email' => 'gilles.migliori@gmail.com',
                'subject'         => 'Php Form Builder - Step Customer Satisfaction Slide Form',
                'filter_values'   => 'cs-step-1, cs-step-2, cs-step-3, cs-step-4, cs-step-5',
                'sent_message'    => '<div class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200" role="alert"> <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg> <div class="ml-3 text-sm font-medium text-green-700">Your message has been successfully sent !</div> <button type="button" class="collapse-toggle-btn ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8" aria-label="Close"> <span class="sr-only">Dismiss</span> <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button> </div><script> (document.querySelectorAll(\'button.collapse-toggle-btn\') || []).forEach(($ct) => { let $alert = $ct.closest(\'div[role="alert"]\'); $ct.addEventListener(\'click\', (e) => { $alert.parentNode.removeChild($alert); }); });</script>',
                'values'          => $values
            );
            $sentMessage = Form::sendMail($emailConfig);
            Form::clear('cs-step-1');
            Form::clear('cs-step-2');
            Form::clear('cs-step-3');
            Form::clear('cs-step-4');
            Form::clear('cs-step-5');
        }
    }
}

$formId = '';

if ($currentStep == 1) {
    /* ==================================================
        Step 1
    ================================================== */

    $formId = 'cs-step-1';

    $form = new Form($formId, 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'tailwind');
    $form->setMode('development');
    $form->addRadio('satisfied-with-company', 'Very Satisfied', 'Very Satisfied', 'data-toggle=true, data-on-icon=fas fa-laugh-beam, data-off-icon=fas fa-times-circle, data-on-color=success-o, data-size=bigger');
    $form->addRadio('satisfied-with-company', 'Somewhat satisfied', 'Somewhat satisfied', 'data-toggle=true, data-on-icon=fas fa-smile, data-off-icon=fas fa-times-circle, data-on-color=primary-o, data-size=bigger');
    $form->addRadio('satisfied-with-company', 'Neither satisfied nor dissatisfied', 'Neither satisfied nor dissatisfied', 'data-toggle=true, data-on-icon=fas fa-meh, data-off-icon=fas fa-times-circle, data-on-color=info-o, data-size=bigger, checked');
    $form->addRadio('satisfied-with-company', 'Somewhat dissatisfied', 'Somewhat dissatisfied', 'data-toggle=true, data-on-icon=fas fa-angry, data-off-icon=fas fa-times-circle, data-on-color=warning-o, data-size=bigger');
    $form->addRadio('satisfied-with-company', 'Very dissatisfied', 'Very dissatisfied', 'data-toggle=true, data-on-icon=fas fa-tired, data-off-icon=fas fa-times-circle, data-on-color=danger-o, data-size=bigger');
    $form->printRadioGroup('satisfied-with-company', 'Overall, how satisfied or dissatisfied are you with our company ?', false, 'required');
    $form->addOption('words-to-describe-our-products[]', 'Reliable', 'Reliable');
    $form->addOption('words-to-describe-our-products[]', 'High quality', 'High quality');
    $form->addOption('words-to-describe-our-products[]', 'Useful', 'Useful');
    $form->addOption('words-to-describe-our-products[]', 'Unique', 'Unique');
    $form->addOption('words-to-describe-our-products[]', 'Good value for money', 'Good value for money');
    $form->addOption('words-to-describe-our-products[]', 'Overpriced', 'Overpriced');
    $form->addOption('words-to-describe-our-products[]', 'Impractical', 'Impractical');
    $form->addOption('words-to-describe-our-products[]', 'Ineffective', 'Ineffective');
    $form->addOption('words-to-describe-our-products[]', 'Poor quality', 'Poor quality');
    $form->addOption('words-to-describe-our-products[]', 'Unreliable', 'Unreliable');
    $form->addHelper('multiple choices - choose at least one', 'words-to-describe-our-products[]');
    $form->addSelect('words-to-describe-our-products[]', 'Which of the following words would you use to describe our products ?', 'data-slimselect=true, data-show-search=false, data-close-on-select=false, multiple, required');
    $form->centerContent();
    $form->addBtn('submit', 'submit-btn', 1, 'Next <i class="fas fa-arrow-alt-circle-right ml-2" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in');
    $options = [
        'plain'       => 'plain',
        'size'        => 'bigger',
        'animations'  => 'smooth'
    ];
    $form->addPlugin('pretty-checkbox', '#' . $formId, 'default', $options);
    $form->addPlugin('formvalidation', '#' . $formId);
    if (isset($sentMessage)) {
        echo $sentMessage;
    }
} elseif ($currentStep == 2) {
    /* ==================================================
        Step 2
    ================================================== */

    $formId = 'cs-step-2';

    $form = new Form($formId, 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'tailwind');
    $form->setMode('development');
    $form->addOption('how-well-do-our-products-meet-your-needs', 'Extremely well', 'Extremely well');
    $form->addOption('how-well-do-our-products-meet-your-needs', 'Very well', 'Very well');
    $form->addOption('how-well-do-our-products-meet-your-needs', 'Somewhat well', 'Somewhat well');
    $form->addOption('how-well-do-our-products-meet-your-needs', 'Not so well', 'Not so well');
    $form->addOption('how-well-do-our-products-meet-your-needs', 'Not at all well', 'Not at all well');
    $form->addSelect('how-well-do-our-products-meet-your-needs', 'How well do our products meet your needs ?', 'data-slimselect=true, required');
    $form->addRadio('rate-the-quality-of-our-products', 'Very high quality', 'Very high quality');
    $form->addRadio('rate-the-quality-of-our-products', 'High quality', 'High quality');
    $form->addRadio('rate-the-quality-of-our-products', 'Neither high nor low quality', 'Neither high nor low quality', 'checked');
    $form->addRadio('rate-the-quality-of-our-products', 'Low quality', 'Low quality');
    $form->addRadio('rate-the-quality-of-our-products', 'Very low quality', 'Very low quality');
    $form->printRadioGroup('rate-the-quality-of-our-products', 'How would you rate the quality of our products ?', false, 'required');
    $form->centerContent();
    $form->addBtn('button', 'back-btn', 2, '<i class="fas fa-arrow-alt-circle-left mr-2" aria-hidden="true"></i> Back', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-2 dark:focus:ring-amber-900', 'btns');
    $form->addBtn('submit', 'submit-btn', 2, 'Next <i class="fas fa-arrow-alt-circle-right ml-2" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');

    $form->addPlugin('pretty-checkbox', '#' . $formId);
    $form->addPlugin('formvalidation', '#' . $formId);
} elseif ($currentStep == 3) {
    /* ==================================================
        Step 3
    ================================================== */

    $formId = 'cs-step-3';

    $form = new Form($formId, 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'tailwind');
    $form->setMode('development');
    $form->addRadio('rate-the-value-for-money-of-our-products', 'Excellent', 'Excellent');
    $form->addRadio('rate-the-value-for-money-of-our-products', 'Above average', 'Above average');
    $form->addRadio('rate-the-value-for-money-of-our-products', 'Average', 'Average', 'checked');
    $form->addRadio('rate-the-value-for-money-of-our-products', 'Below average', 'Below average');
    $form->addRadio('rate-the-value-for-money-of-our-products', 'Poor', 'Poor');
    $form->printRadioGroup('rate-the-value-for-money-of-our-products', 'How would you rate the value for money of our products ?', false, 'required');
    $form->addRadio('responsive-to-questions-about-our-products', 'Extremely responsive', 'Extremely responsive');
    $form->addRadio('responsive-to-questions-about-our-products', 'Very responsive', 'Very responsive');
    $form->addRadio('responsive-to-questions-about-our-products', 'Moderately responsive', 'Moderately responsive', 'checked');
    $form->addRadio('responsive-to-questions-about-our-products', 'Not so responsive', 'Not so responsive');
    $form->addRadio('responsive-to-questions-about-our-products', 'Not at all responsive', 'Not at all responsive');
    $form->addRadio('responsive-to-questions-about-our-products', 'Not applicable', 'Not applicable');
    $form->printRadioGroup('responsive-to-questions-about-our-products', 'How responsive have we been to your questions or concerns about our products ?', false, 'required');
    $form->centerContent();
    $form->addBtn('button', 'back-btn', 3, '<i class="fas fa-arrow-alt-circle-left mr-2" aria-hidden="true"></i> Back', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-2 dark:focus:ring-amber-900', 'btns');
    $form->addBtn('submit', 'submit-btn', 3, 'Next <i class="fas fa-arrow-alt-circle-right ml-2" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');

    $form->addPlugin('pretty-checkbox', '#' . $formId);
    $form->addPlugin('formvalidation', '#' . $formId);
} elseif ($currentStep == 4) {
    /* ==================================================
        Step 4
    ================================================== */

    $formId = 'cs-step-4';

    $form = new Form($formId, 'horizontal', 'data-fv-no-auto-submit=true, novalidate', 'tailwind');
    $form->setMode('development');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', 'This is my first purchase', 'This is my first purchase');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', 'Less than six months', 'Less than six months');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', 'Six months to a year', 'Six months to a year');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', '1 - 2 years', '1 - 2 years');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', '3 or more years', '3 or more years');
    $form->addRadio('how-long-have-you-been-a-customer-of-our-company', 'I haven\'t made a purchase yet', 'I haven\'t made a purchase yet');
    $form->printRadioGroup('how-long-have-you-been-a-customer-of-our-company', 'How long have you been a customer of our company ?', false, 'required');
    $form->addRadio('how-likely-purchase-products-again', 'Extremely likely', 'Extremely likely');
    $form->addRadio('how-likely-purchase-products-again', 'Very likely', 'Very likely');
    $form->addRadio('how-likely-purchase-products-again', 'Somewhat likely', 'Somewhat likely', 'checked');
    $form->addRadio('how-likely-purchase-products-again', 'Not so likely', 'Not so likely');
    $form->addRadio('how-likely-purchase-products-again', 'Not at all likely', 'Not at all likely');
    $form->printRadioGroup('how-likely-purchase-products-again', 'How likely are you to purchase any of our products again ?', false, 'required');
    $form->centerContent();
    $form->addBtn('button', 'back-btn', 4, '<i class="fas fa-arrow-alt-circle-left mr-2" aria-hidden="true"></i> Back', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-2 dark:focus:ring-amber-900', 'btns');
    $form->addBtn('submit', 'submit-btn', 4, 'Next <i class="fas fa-arrow-alt-circle-right ml-2" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');

    $form->addPlugin('pretty-checkbox', '#' . $formId);
    $form->addPlugin('formvalidation', '#' . $formId);
} elseif ($currentStep == 5) {
    /* ==================================================
        Step 5
    ================================================== */

    $formId = 'cs-step-5';

    $form = new Form($formId, 'vertical', 'data-fv-no-auto-submit=true, novalidate', 'tailwind');
    $form->setMode('development');
    $form->addRadio('recommend-to-a-friend-or-colleague', '0', '0');
    $form->addRadio('recommend-to-a-friend-or-colleague', '1', '1');
    $form->addRadio('recommend-to-a-friend-or-colleague', '2', '2');
    $form->addRadio('recommend-to-a-friend-or-colleague', '3', '3');
    $form->addRadio('recommend-to-a-friend-or-colleague', '4', '4');
    $form->addRadio('recommend-to-a-friend-or-colleague', '5', '5');
    $form->addRadio('recommend-to-a-friend-or-colleague', '6', '6');
    $form->addRadio('recommend-to-a-friend-or-colleague', '7', '7');
    $form->addRadio('recommend-to-a-friend-or-colleague', '8', '8');
    $form->addRadio('recommend-to-a-friend-or-colleague', '9', '9');
    $form->addRadio('recommend-to-a-friend-or-colleague', '10', '10');
    $form->printRadioGroup('recommend-to-a-friend-or-colleague', 'How likely is it that you would recommend this company to a friend or colleague ?', true, 'required');
    $form->addTextarea('other-comments', '', 'Do you have any other comments, questions, or concerns ?', 'rows=7');
    $form->centerContent();
    $form->addBtn('button', 'back-btn', 5, '<i class="fas fa-arrow-alt-circle-left mr-2" aria-hidden="true"></i> Back', 'class=text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-l-lg text-sm px-5 py-2.5 text-center mb-2 dark:focus:ring-amber-900', 'btns');
    $form->addBtn('submit', 'submit-btn', 5, 'Submit <i class="fas fa-arrow-alt-circle-right ml-2" aria-hidden="true"></i>', 'class=text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800, data-ladda-button=true, data-style=zoom-in', 'btns');
    $form->printBtnGroup('btns');

    $form->addPlugin('pretty-checkbox', '#' . $formId);
    $form->addPlugin('formvalidation', '#' . $formId);
}

// test if $form is an instance of Form
if (isset($form) && $form instanceof Form) {
    $form->render();

    $options = array(
        'openDomReady'  => '',
        'closeDomReady' => ''
    );
    $form->setOptions($options);

    $form->printJsCode();
?>
    <script>
        initFormEvents('<?php echo $formId; ?>');
    </script>
<?php
}
