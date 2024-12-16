<?php

use phpformbuilder\Form;

session_start();
$canonicalGet = '';
$transition = '?';

$preferedFramework = 'bootstrap-5';
$preferedForms     = '';

if (isset($_GET['framework']) && preg_match('`[a-z-]+`', $_GET['framework'])) {
    $preferedFramework = $_GET['framework'];
    $canonicalGet = '?framework=' . $_GET['framework'];
    $transition = '&';
} elseif (isset($_COOKIE['prefered_framework']) && preg_match('`[a-z-]+`', $_COOKIE['prefered_framework'])) {
    $preferedFramework = $_COOKIE['prefered_framework'];
} else {
    setcookie('prefered_framework', $preferedFramework, time() + (86400 * 30), "/");
}

$bs4Checked                 = '';
$bs4_on                      = '';
$bs5Checked                 = '';
$bs5_on                      = '';
$bulmaChecked               = '';
$bulmaOn                    = '';
$foundationChecked          = '';
$foundationOn               = '';
$materialBootstrapChecked  = '';
$materialBootstrapOn       = '';
$materialChecked            = '';
$materialOn                 = '';
$tailwindChecked            = '';
$tailwindOn                 = '';
$uikitChecked               = '';
$uikitOn                    = '';
switch ($preferedFramework) {
    case 'bootstrap-4':
        $bs4Checked = 'checked';
        $bs4_on      = 'framework-on';
        break;

    case 'bulma':
        $bulmaChecked = 'checked';
        $bulmaOn      = 'framework-on';
        break;

    case 'foundation':
        $foundationChecked = 'checked';
        $foundationOn      = 'framework-on';
        break;

    case 'material-bootstrap':
        $materialBootstrapChecked = 'checked';
        $materialBootstrapOn      = 'framework-on';
        break;

    case 'material':
        $materialChecked = 'checked';
        $materialOn      = 'framework-on';
        break;

    case 'tailwind':
        $tailwindChecked = 'checked';
        $tailwindOn      = 'framework-on';
        break;

    case 'uikit':
        $uikitChecked = 'checked';
        $uikitOn      = 'framework-on';
        break;

    default:
        $bs5Checked = 'checked';
        $bs5_on      = 'framework-on';
        break;
}

$titles = [
    'frameworks' => [
        'bootstrap-4'         => 'Bootstrap 4',
        'bootstrap-5'         => 'Bootstrap 5',
        'bulma'               => 'Bulma',
        'foundation'          => 'Foundation',
        'material-bootstrap'  => 'Material Bootstrap',
        'material'            => 'Material',
        'tailwind'            => 'Tailwind',
        'uikit'               => 'UiKit'
    ],
    'forms' => [
        'accordion'            => 'Accordion forms',
        'ajax'                 => 'Ajax forms',
        'contact-form'         => 'Contact forms',
        'dynamic-fields'       => 'Forms with dynamic fields',
        'extended'             => 'Extended forms',
        'horizontal'           => 'Horizontal forms',
        'loadjs'               => 'Forms loaded with Loadjs',
        'license-form'         => 'License agreement forms',
        'modal-form'           => 'Modal forms',
        'order-rental'         => 'Order / Rental forms',
        'prefilled-form'       => 'Forms prefilled from Database',
        'popover-form'         => 'Popover forms',
        'reservation-booking'  => 'Reservation / Booking forms',
        'search'               => 'Search forms',
        'sign-in'              => 'Sign-in forms',
        'step'                 => 'Step forms',
        'survey'               => 'Survey forms',
        'vertical'             => 'Vertical forms'
    ]
];

$titleArray = [];
$titleArray[] = $titles['frameworks'][$preferedFramework] . ' form templates';


if (isset($_GET['forms']) && preg_match('`[a-z-]+`', $_GET['forms']) && array_key_exists($_GET['forms'], $titles['forms'])) {
    $preferedForms = $_GET['forms'];
    $canonicalGet .= $transition . 'forms=' . $_GET['forms'];
    $titleArray[] = '<br><small class="ms-1">' . $titles['forms'][$preferedForms] . '</small>';
}

$title = implode(' ', $titleArray);

/* =============================================
    Forms
============================================= */

$formsBase = array(
    array(
        'title'      =>  'Ajax Loaded Contact Form 1',
        'desc'       =>  'Contact form in HTML file loaded with Ajax',
        'desc-class' =>  '',
        'link'       =>  '/ajax-loaded-contact-form-1.html',
        'class'      =>  'horizontal ajax contact-form has-captcha has-checkbox has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail'
    ),
    array(
        'title'      =>  'Multiple Ajax forms on the same page',
        'desc'       =>  'Multiple Ajax forms in HTML file loaded with Ajax',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/ajax-loaded-multiple-forms.html',
        'class'      =>  'horizontal ajax contact-form modal-form sign-in has-captcha has-checkbox has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-dynamic'
    ),
    array(
        'title'      =>  'Booking Form',
        'desc'       =>  'Booking Form date &amp; time pickers, icon select list',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/booking-form.php',
        'class'      =>  'horizontal reservation-booking has-dependent-fields has-picker has-select  has-intl-tel-input has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-food'
    ),
    array(
        'title'      =>  'Car Rental Form',
        'desc'       =>  'Step form with accordion &amp; step validation',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/car-rental-form.php',
        'class'      =>  'horizontal order-rental step accordion has-checkbox has-picker has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-car'
    ),
    array(
        'title'      =>  'Contact Form 1 loaded with Loadjs',
        'desc'       =>  'Horizontal contact form with captcha',
        'desc-class' =>  '',
        'link'       =>  '/contact-form-1-loadjs.php',
        'class'      =>  'horizontal contact-form has-captcha has-charcount has-checkbox loadjs has-switch has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail'
    ),
    array(
        'title'      =>  'Contact Form 1 Modal',
        'desc'       =>  'Horizontal contact form with captcha',
        'desc-class' =>  '',
        'link'       =>  '/contact-form-1-modal.php',
        'class'      =>  'horizontal contact-form has-captcha has-charcount has-checkbox modal-form has-switch has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail'
    ),
    array(
        'title'      =>  'Contact Form 1 Popover',
        'desc'       =>  'Horizontal contact form with captcha',
        'desc-class' =>  '',
        'link'       =>  '/contact-form-1-popover.php',
        'class'      =>  'horizontal contact-form popover-form has-captcha has-charcount has-checkbox has-switch has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail'
    ),
    array(
        'title'      =>  'Contact Form 1',
        'desc'       =>  'Horizontal contact form with anti-spam &amp; captcha',
        'desc-class' =>  '',
        'link'       =>  '/contact-form-1.php',
        'class'      =>  'horizontal contact-form has-antispam has-captcha has-charcount has-checkbox has-switch has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail'
    ),
    array(
        'title'      =>  'Contact Form 2',
        'desc'       =>  'Vertical contact form with captcha',
        'desc-class' =>  '',
        'link'       =>  '/contact-form-2.php',
        'class'      =>  'vertical contact-form has-captcha has-charcount has-checkbox has-switch has-validation has-intl-tel-input',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-address-book'
    ),
    array(
        'title'      =>  'Contact Form 3',
        'desc'       =>  'Contact form with rich text editor &amp; dependent field',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/contact-form-3.php',
        'class'      =>  'horizontal contact-form has-dependent-fields has-select has-tinymce has-checkbox has-intl-tel-input has-switch has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-phone'
    ),
    array(
        'title'      =>  'Custom Radio/Checkbox Form',
        'desc'       =>  'With Custom CSS plugin',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/custom-radio-checkbox-css-form.php',
        'class'      =>  'horizontal has-checkbox',
        'frameworks' =>  array('bootstrap5', 'bootstrap4', 'foundation'),
        'icon'       =>  'icon-check-square-o'
    ),
    array(
        'title'      =>  'Customer Feedback Form',
        'desc'       =>  '2 columns<br>Feedback Form<br>with multiselect',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/customer-feedback-form.php',
        'class'      =>  'horizontal survey has-select has-checkbox has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-comments'
    ),
    array(
        'title'      =>  'Customer Satisfaction Step Form',
        'desc'       =>  'Ajax step form with sliding transitions',
        'desc-class' =>  '',
        'link'       =>  '/customer-satisfaction-step-form.php',
        'class'      =>  'horizontal survey step ajax has-select has-checkbox',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-chart'
    ),
    array(
        'title'      =>  'Customer Support Form',
        'desc'       =>  'Ajax step form with sliding transitions',
        'desc-class' =>  '',
        'link'       =>  '/customer-support-form.php',
        'class'      =>  'horizontal ajax contact-form prefilled-form has-select has-checkbox has-dependent-fields has-file-upload has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-lifebuoy'
    ),
    array(
        'title'      =>  'CV Submission Form',
        'desc'       =>  'Horizontal form with rich text editor &amp; file upload',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/cv-submission-form.php',
        'class'      =>  'horizontal has-file-upload has-tinymce has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-profile'
    ),
    array(
        'title'      =>  'Date range picker examples',
        'desc'       =>  'Date range picker examples',
        'desc-class' =>  '',
        'link'       =>  '/date-range-picker-form.php',
        'class'      =>  'horizontal has-picker',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-calendar'
    ),
    array(
        'title'      =>  'Values from database',
        'desc'       =>  'Retrieve default values from database',
        'desc-class' =>  '',
        'link'       =>  '/default-db-values-form.php',
        'class'      =>  'horizontal prefilled-form has-checkbox has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-database'
    ),
    array(
        'title'      =>  'Dependent fields Form',
        'desc'       =>  'Form with several conditional fields',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/dependent-fields.php',
        'class'      =>  'horizontal has-dependent-fields has-select has-validation has-captcha has-checkbox',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-tree'
    ),
    array(
        'title'      =>  'Dependent select dropdown',
        'desc'       =>  'Select box with option values depending on another select choice',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/dependent-select-dropdown.php',
        'class'      =>  'vertical ajax prefilled-form has-dependent-fields has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-tree'
    ),
    array(
        'title'      =>  'Dynamic fields Form 1',
        'desc'       =>  'Horizontal form with dynalic fields',
        'desc-class' =>  '',
        'link'       =>  '/dynamic-fields-form-1.php',
        'class'      =>  'horizontal dynamic-fields ajax has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-dynamic'
    ),
    array(
        'title'      =>  'Dynamic fields Form 2',
        'desc'       =>  'Horizontal form with dynalic fields',
        'desc-class' =>  '',
        'link'       =>  '/dynamic-fields-form-2.php',
        'class'      =>  'horizontal dynamic-fields ajax has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-spinner4'
    ),
    array(
        'title'      =>  'Email templates form',
        'desc'       =>  'Contact form with custom email templates',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/email-templates.php',
        'class'      =>  'vertical contact-form has-select has-captcha has-checkbox has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-mail-read'
    ),
    array(
        'title'      =>  'Employment Application Form',
        'desc'       =>  'Horizontal form with Image upload',
        'desc-class' =>  '',
        'link'       =>  '/employment-application-form.php',
        'class'      =>  'horizontal has-file-upload has-checkbox has-picker has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-profile'
    ),
    array(
        'title'      =>  'Extended contact Form',
        'desc'       =>  'Contact form with custom functions',
        'desc-class' =>  '',
        'link'       =>  '/extended-contact-form.php',
        'class'      =>  'horizontal extended has-captcha has-checkbox has-charcount has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-profile'
    ),
    array(
        'title'      =>  'Extended users Form',
        'desc'       =>  'Users form with custom functions',
        'desc-class' =>  '',
        'link'       =>  '/extended-users-form.php',
        'class'      =>  'horizontal extended has-checkbox has-select has-country-select has-picker has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-profile'
    ),
    array(
        'title'      =>  'File Upload Test Form',
        'desc'       =>  '3 File upload forms for files|images|images + captions',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/fileupload-test-form.php',
        'class'      =>  'horizontal has-file-upload',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-upload'
    ),
    array(
        'title'      =>  'Image Picker Form',
        'desc'       =>  'Replace Select Element with Image Picker',
        'desc-class' =>  '',
        'link'       =>  '/image-picker-form.php',
        'class'      =>  'vertical has-select has-image-picker',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-images'
    ),
    array(
        'title'      =>  'Input with Addons',
        'desc'       =>  'Input &amp; Select with Icon, Button &amp; Text addons',
        'desc-class' =>  '',
        'link'       =>  '/input-with-addons.php',
        'class'      =>  'horizontal has-select has-picker has-select',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-glass'
    ),
    array(
        'title'      =>  'Join Us Form Modal',
        'desc'       =>  'Horizontal suscribe Modal form',
        'desc-class' =>  '',
        'link'       =>  '/join-us-form-modal.php',
        'class'      =>  'horizontal modal-form sign-in has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-user-plus'
    ),
    array(
        'title'      =>  'Join Us Form Popover',
        'desc'       =>  'Horizontal suscribe Popover form',
        'desc-class' =>  '',
        'link'       =>  '/join-us-form-popover.php',
        'class'      =>  'horizontal sign-in popover-form has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-user-plus'
    ),
    array(
        'title'      =>  'Join Us Form',
        'desc'       =>  'Horizontal<br>suscribe form',
        'desc-class' =>  '',
        'link'       =>  '/join-us-form.php',
        'class'      =>  'horizontal sign-in has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-user-plus'
    ),
    array(
        'title'      =>  'License agreement form',
        'desc'       =>  'License agreement form with signature pad',
        'desc-class' =>  '',
        'link'       =>  '/license-agreement.php',
        'class'      =>  'vertical license-form has-signature',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-pencil2'
    ),
    array(
        'title'      =>  'Multiple modal forms on same page',
        'desc'       =>  'Multiple modal forms<br>on same page',
        'desc-class' =>  '',
        'link'       =>  '/multiple-modals.php',
        'class'      =>  'vertical sign-in contact-form modal-form has-password has-captcha has-charcount has-checkbox has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-stack'
    ),
    array(
        'title'      =>  'Multiple popover forms on same page',
        'desc'       =>  'Multiple popover forms<br>on same page',
        'desc-class' =>  '',
        'link'       =>  '/multiple-popovers.php',
        'class'      =>  'horizontal sign-in contact-form popover-form has-checkbox has-password has-captcha has-charcount has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-stack'
    ),
    array(
        'title'      =>  'Newsletter Suscribe Form',
        'desc'       =>  'Horizontal Newsletter suscribe form',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/newsletter-suscribe-form.php',
        'class'      =>  'vertical sign-in has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-newspaper'
    ),
    array(
        'title'      =>  'Order Form',
        'desc'       =>  'Order Form with Payment Method<br>&amp Country select',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/order-form.php',
        'class'      =>  'vertical order-rental has-dependent-fields has-country-select has-checkbox has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-cart'
    ),
    array(
        'title'      =>  'Post with Ajax Form',
        'desc'       =>  'Horizontal suscribe Popover form',
        'desc-class' =>  '',
        'link'       =>  '/post-with-ajax-form.php',
        'class'      =>  'horizontal ajax sign-in has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-newspaper '
    ),
    array(
        'title'      =>  'Room Booking Form',
        'desc'       =>  'Booking Form<br>Date Picker,<br>Rich Text Editor',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/room-booking-form.php',
        'class'      =>  'horizontal reservation-booking has-tinymce has-picker has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-bed'
    ),
    array(
        'title'      =>  'Search Form',
        'desc'       =>  'Search Form with 2 Autocomplete - 2<sup>nd</sup> with ajax search',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/search-form.php',
        'class'      =>  'vertical search has-autocomplete ajax',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-search'
    ),
    array(
        'title'      =>  'Sign Up Form Modal',
        'desc'       =>  'Vertical Form Modal password generator',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/sign-up-form-modal.php',
        'class'      =>  'vertical modal-form sign-in has-password has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-key'
    ),
    array(
        'title'      =>  'Sign Up Form Popover',
        'desc'       =>  'Vertical Form<br>password generator &amp; validation',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/sign-up-form-popover.php',
        'class'      =>  'vertical popover-form sign-in has-password has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-key'
    ),
    array(
        'title'      =>  'Sign Up Form',
        'desc'       =>  'Vertical Form<br>password generator &amp; validation',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/sign-up-form.php',
        'class'      =>  'vertical sign-in has-password has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-key'
    ),
    array(
        'title'      =>  'Simple Step Form',
        'desc'       =>  'Simple Step Form with step validation',
        'desc-class' =>  '',
        'link'       =>  '/simple-step-form.php',
        'class'      =>  'horizontal step has-checkbox has-select has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-rocket'
    ),
    array(
        'title'      =>  'Special Offer Sign Up',
        'desc'       =>  'Simple Vertical<br>Sign Up Form',
        'desc-class' =>  '',
        'link'       =>  '/special-offer-sign-up.php',
        'class'      =>  'vertical sign-in has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-gift'
    ),
    array(
        'title'      =>  'Switches Radio/Checkbox Form',
        'desc'       =>  'On/Off with LC-Switch plugin',
        'desc-class' =>  ' class="small"',
        'link'       =>  '/switches-form.php',
        'class'      =>  'horizontal has-checkbox has-switch',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-toggle-on'
    ),
    array(
        'title'      =>  'JavaScript tooltip examples',
        'desc'       =>  'JavaScript tooltip examples',
        'desc-class' =>  '',
        'link'       =>  '/tooltip-form.php',
        'class'      =>  'horizontal has-tooltip has-checkbox',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-comments'
    ),
    array(
        'title'      =>  'JavaScript validation examples',
        'desc'       =>  'JavaScript validation examples',
        'desc-class' =>  '',
        'link'       =>  '/validation-with-javascript-example-form.php',
        'class'      =>  'horizontal has-checkbox has-validation',
        'frameworks' =>  array('bootstrap4', 'bootstrap5', 'bulma', 'foundation', 'material-bootstrap', 'material', 'tailwind', 'uikit'),
        'icon'       =>  'icon-check-square-o'
    )
);

$list = '';
$forms = array();
$formsBaseProps = array(
    array(
        'framework'  => 'bootstrap4',
        'class'      => 'bootstrap-4 active ' . $bs4_on . ' ',
        'link'       => 'bootstrap-4-forms',
        'card-class' => 'bs4',
        'badge-text' => 'Bootstrap 4'
    ),
    array(
        'framework'  => 'bootstrap5',
        'class'      => 'bootstrap-5 active ' . $bs5_on . ' ',
        'link'       => 'bootstrap-5-forms',
        'card-class' => 'bs5',
        'badge-text' => 'Bootstrap 5'
    ),
    array(
        'framework'  => 'bulma',
        'class'      => 'bulma active ' . $bulmaOn . ' ',
        'link'       => 'bulma-forms',
        'card-class' => 'bulma',
        'badge-text' => 'Bulma'
    ),
    array(
        'framework'  => 'foundation',
        'class'      => 'foundation active ' . $foundationOn . ' ',
        'link'       => 'foundation-forms',
        'card-class' => 'foundation',
        'badge-text' => 'Foundation'
    ),
    array(
        'framework'  => 'material-bootstrap',
        'class'      => 'material-bootstrap active ' . $materialBootstrapOn . ' ',
        'link'       => 'material-bootstrap-forms',
        'card-class' => 'material-bootstrap',
        'badge-text' => 'Material<br>Bootstrap'
    ),
    array(
        'framework'  => 'material',
        'class'      => 'material active ' . $materialOn . ' ',
        'link'       => 'material-forms',
        'card-class' => 'material',
        'badge-text' => 'Material'
    ),
    array(
        'framework'  => 'tailwind',
        'class'      => 'tailwind active ' . $tailwindOn . ' ',
        'link'       => 'tailwind-forms',
        'card-class' => 'tailwind',
        'badge-text' => 'Tailwind'
    ),
    array(
        'framework'  => 'uikit',
        'class'      => 'uikit active ' . $uikitOn . ' ',
        'link'       => 'uikit-forms',
        'card-class' => 'uikit',
        'badge-text' => 'UIKit'
    )
);

foreach ($formsBase as $form) {
    foreach ($formsBaseProps as $baseProp) {
        if (in_array($baseProp['framework'], $form['frameworks'])) {
            $list .= '<div class="col-12 col-sm-6 col-xl-4 grid-item ' . $baseProp['class'] . ' ' . $form['class'] . '">' . "\n";
            $list .= '  <div class="grid-item-content">';
            $list .= '      <a href="/templates/' . $baseProp['link'] . $form['link'] . '" class="card bg-' . $baseProp['card-class'] . ' ' . $form['icon'] . ' has-icon" target="_blank">' . "\n";
            $list .= '          <p class="item condensed m-0">' . $form['title'] . ' <span class="badge badge-xs badge-' . $baseProp['card-class'] . ' ">' . $baseProp['badge-text'] . '</span></p>' . "\n";
            $list .= '      </a>' . "\n";
            $list .= '  </div>' . "\n";
            $list .= '</div>' . "\n";
        }
    }
}
include_once '../phpformbuilder/autoload.php';
$toggleTemplates = new Form('toggle-templates', 'vertical', '', 'material');
$toggleTemplates->setMode('development');
// $toggleTemplates->useLoadJs('core');
$toggleTemplates->addPlugin('materialize', '#toggle-templates');
/*
bootstrap 4
bootstrap 5
bulma
foundation
material bootstrap
material
tailwind
uikit

accordion
ajax
contact-form
horizontal
modal-form
order-rental
popover-form
prefilled-form
reservation-booking
search
sign-in
step
survey
vertical

has-autocomplete
has-captcha
has-charcount
has-checkbox
has-country-select
has-dependent-fields
has-file-upload
has-image-picker
has-password
has-picker
has-select
has-signature
has-switch
has-tinymce
has-tooltip
has-validation
 */

$toggleTemplates->startFieldset('Frameworks');
$toggleTemplates->addRadio('templates-framework', 'Bootstrap 4', 'bootstrap-4', 'data-title=' . $titles['frameworks']['bootstrap-4'] . ', ' . $bs4Checked);
$toggleTemplates->addRadio('templates-framework', 'Bootstrap 5', 'bootstrap-5', 'data-title=' . $titles['frameworks']['bootstrap-5'] . ', ' . $bs5Checked);
$toggleTemplates->addRadio('templates-framework', 'Bulma', 'bulma', 'data-title=' . $titles['frameworks']['bulma'] . ', ' . $bulmaChecked);
$toggleTemplates->addRadio('templates-framework', 'Foundation', 'foundation', 'data-title=' . $titles['frameworks']['foundation'] . ', ' . $foundationChecked);
$toggleTemplates->addRadio('templates-framework', 'Material Bootstrap', 'material-bootstrap', 'data-title=' . $titles['frameworks']['material-bootstrap'] . ', ' . $materialBootstrapChecked);
$toggleTemplates->addRadio('templates-framework', 'Material Design', 'material', 'data-title=' . $titles['frameworks']['material'] . ', ' . $materialChecked);
$toggleTemplates->addRadio('templates-framework', 'Tailwind', 'tailwind', 'data-title=' . $titles['frameworks']['tailwind'] . ', ' . $tailwindChecked);
$toggleTemplates->addRadio('templates-framework', 'UIKit', 'uikit', 'data-title=' . $titles['frameworks']['uikit'] . ', ' . $uikitChecked);
$toggleTemplates->printRadioGroup('templates-framework', '', false);
$toggleTemplates->endFieldset();
$toggleTemplates->startFieldset('Forms');
$toggleTemplates->addCheckbox('templates-chk', 'Accordion', 'accordion', 'data-title=' . $titles['forms']['accordion'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Ajax', 'ajax', 'data-title=' . $titles['forms']['ajax'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Contact', 'contact-form', 'data-title=' . $titles['forms']['contact-form'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Dynamic Fields', 'dynamic-fields', 'data-title=' . $titles['forms']['dynamic-fields'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Extended forms', 'extended', 'data-title=' . $titles['forms']['extended'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Horizontal', 'horizontal', 'data-title=' . $titles['forms']['horizontal'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Loaded with Loadjs', 'loadjs', 'data-title=' . $titles['forms']['loadjs'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'License agreement', 'license-form', 'data-title=' . $titles['forms']['license-form'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Modal', 'modal-form', 'data-title=' . $titles['forms']['modal-form'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Order / Rental', 'order-rental', 'data-title=' . $titles['forms']['order-rental'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Prefilled from Db', 'prefilled-form', 'data-title=' . $titles['forms']['prefilled-form'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Popover', 'popover-form', 'data-title=' . $titles['forms']['popover-form'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Reservation / Booking', 'reservation-booking', 'data-title=' . $titles['forms']['reservation-booking'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Search Form', 'search', 'data-title=' . $titles['forms']['search'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Sign-in', 'sign-in', 'data-title=' . $titles['forms']['sign-in'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Step Form', 'step', 'data-title=' . $titles['forms']['step'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Survey', 'survey', 'data-title=' . $titles['forms']['survey'] . ', checked');
$toggleTemplates->addCheckbox('templates-chk', 'Vertical', 'vertical', 'data-title=' . $titles['forms']['vertical'] . ', checked');
$toggleTemplates->printCheckboxGroup('templates-chk', '', false);
$toggleTemplates->endFieldset();
$toggleTemplates->startFieldset('Plugins');
$toggleTemplates->addCheckbox('plugins-chk', 'Anti-SPAM (Altcha)', 'has-antispam', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Autocomplete', 'has-autocomplete', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Captcha', 'has-captcha', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Checkbox &amp; radio buttons', 'has-checkbox', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Country Select', 'has-country-select', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Dependent Fields', 'has-dependent-fields', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'File Upload', 'has-file-upload', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Image Picker', 'has-image-picker', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Intl Tel Input', 'has-intl-tel-input', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Password', 'has-password', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Pickers', 'has-picker', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Select', 'has-select', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Signature pad', 'has-signature', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Switch', 'has-switch', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Text editor (tinyMce)', 'has-tinymce', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Tooltip', 'has-tooltip', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Validation', 'has-validation', 'checked');
$toggleTemplates->addCheckbox('plugins-chk', 'Word/Char Count', 'has-charcount', 'checked');
$toggleTemplates->printCheckboxGroup('plugins-chk', '', false);
$toggleTemplates->endFieldset();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php
    $canonicalGet = '';
    $transition = '?';
    if (isset($_GET['framework']) && preg_match('`[a-z-]+`', $_GET['framework'])) {
        $canonicalGet = '?framework=' . $_GET['framework'];
        $transition = '&';
    }
    if (isset($_GET['forms']) && preg_match('`[a-z-]+`', $_GET['forms'])) {
        $canonicalGet .= $transition . 'forms=' . $_GET['forms'];
    }

    $meta = array(
        'title'       => $titles['frameworks'][$preferedFramework] . ' Forms Templates - Php Form Builder',
        'description' => $titles['frameworks'][$preferedFramework] . ' Forms Templates with source code. These PHP/HTML templates show the infinite possibilities of what Php Form Builder can create.',
        'canonical'   => 'https://www.phpformbuilder.pro/templates/index.php' . $canonicalGet,
        'screenshot'  => 'templates.png'
    );
    include_once '../documentation/inc/page-head.php';
    ?>
    <style>
        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto Condensed;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: bootstrap-icons;
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")
        }

        @font-face {
            font-family: icomoon;
            font-display: swap;
            font-style: normal;
            font-weight: 400;
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.eot?rnh868');
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.eot?rnh868#iefix') format("embedded-opentype"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.ttf?rnh868') format("truetype"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.woff?rnh868') format("woff"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.svg?rnh868#icomoon') format("svg")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto Condensed;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")
        }

        .dmca-badge {
            min-height: 100px
        }

        @font-face {
            font-display: swap;
            font-family: bootstrap-icons;
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")
        }

        @font-face {
            font-family: icomoon;
            font-display: swap;
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.eot?rnh868');
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.eot?rnh868#iefix') format("embedded-opentype"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.ttf?rnh868') format("truetype"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.woff?rnh868') format("woff"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/icomoon.svg?rnh868#icomoon') format("svg");
            font-weight: 400;
            font-style: normal
        }

        @media (min-width:1200px) {
            h1 {
                font-size: 2.5rem
            }

            .h3 {
                font-size: 1.640625rem
            }

            legend {
                font-size: 1.5rem
            }

            .col-xl-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }
        }

        [class*=" icon-"],
        [class^=icon-] {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-family: icomoon;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 1;
            text-transform: none
        }

        :root {
            --bs-blue: #0e73cc;
            --bs-red: #fc4848;
            --bs-yellow: #ffc107;
            --bs-gray: #8c8476;
            --bs-gray-dark: #38352f;
            --bs-gray-100: #f6f6f5;
            --bs-gray-200: #eae8e5;
            --bs-gray-300: #d4d1cc;
            --bs-gray-400: #bfbab2;
            --bs-gray-500: #a9a398;
            --bs-gray-600: #7f7a72;
            --bs-gray-700: #55524c;
            --bs-gray-800: #2a2926;
            --bs-gray-900: #191817;
            --bs-primary: #0e73cc;
            --bs-secondary: #7f7a72;
            --bs-success: #0f9e7b;
            --bs-info: #00c2db;
            --bs-pink: #e6006f;
            --bs-warning: #ffc107;
            --bs-danger: #fc4848;
            --bs-light: #f6f6f5;
            --bs-dark: #191817;
            --bs-primary-rgb: 14, 115, 204;
            --bs-secondary-rgb: 127, 122, 114;
            --bs-success-rgb: 15, 158, 123;
            --bs-info-rgb: 0, 194, 219;
            --bs-pink-rgb: 230, 0, 111;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 252, 72, 72;
            --bs-light-rgb: 246, 246, 245;
            --bs-dark-rgb: 25, 24, 23;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 42, 45, 45;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace;
            --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0));
            --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            --bs-body-font-size: 0.9375rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #2a2d2d;
            --bs-body-bg: #fff
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            -webkit-text-size-adjust: 100%;
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            margin: 0;
            text-align: var(--bs-body-text-align)
        }

        .h3,
        .h4,
        h1,
        h4 {
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: .5rem;
            margin-top: 0
        }

        h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        .h3 {
            font-size: calc(1.28906rem + .46875vw)
        }

        @media (min-width:1200px) {
            h1 {
                font-size: 2.5rem
            }

            .h3 {
                font-size: 1.640625rem
            }
        }

        .h4,
        h4 {
            font-size: calc(1.26563rem + .1875vw)
        }

        @media (min-width:1200px) {

            .h4,
            h4 {
                font-size: 1.40625rem
            }
        }

        p {
            margin-bottom: 1rem;
            margin-top: 0
        }

        ul {
            padding-left: 2rem
        }

        ul {
            margin-bottom: 1rem;
            margin-top: 0
        }

        a {
            color: #0e73cc;
            text-decoration: underline
        }

        img,
        svg {
            vertical-align: middle
        }

        label {
            display: inline-block
        }

        button {
            border-radius: 0
        }

        button,
        input {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            margin: 0
        }

        button {
            text-transform: none
        }

        button {
            -webkit-appearance: button;
            appearance: button
        }

        ::-moz-focus-inner {
            border-style: none;
            padding: 0
        }

        fieldset {
            border: 0;
            margin: 0;
            min-width: 0;
            padding: 0
        }

        legend {
            float: left;
            font-size: calc(1.275rem + .3vw);
            line-height: inherit;
            margin-bottom: .5rem;
            padding: 0;
            width: 100%
        }

        legend+* {
            clear: left
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        .list-unstyled {
            list-style: none;
            padding-left: 0
        }

        .badge {
            border-radius: 0;
            color: #fff;
            display: inline-block;
            font-size: .75em;
            font-weight: 500;
            line-height: 1;
            padding: .35em .65em;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .btn {
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0;
            color: #2a2d2d;
            display: inline-block;
            font-size: .9375rem;
            font-weight: 400;
            line-height: 1.5;
            padding: .375rem .75rem;
            text-align: center;
            text-decoration: none;
            vertical-align: middle
        }

        .btn-success {
            background-color: #0f9e7b;
            border-color: #0f9e7b;
            box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075);
            color: #000
        }

        .card {
            word-wrap: break-word;
            background-clip: border-box;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0;
            display: flex;
            flex-direction: column;
            min-width: 0;
            position: relative
        }

        .container-fluid {
            margin-left: auto;
            margin-right: auto;
            padding-left: var(--bs-gutter-x, .75rem);
            padding-right: var(--bs-gutter-x, .75rem);
            width: 100%
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-left: calc(var(--bs-gutter-x)*-.5);
            margin-right: calc(var(--bs-gutter-x)*-.5);
            margin-top: calc(var(--bs-gutter-y)*-1)
        }

        .row>* {
            flex-shrink: 0;
            margin-top: var(--bs-gutter-y);
            max-width: 100%;
            padding-left: calc(var(--bs-gutter-x)*.5);
            padding-right: calc(var(--bs-gutter-x)*.5);
            width: 100%
        }

        .col {
            flex: 1 0 0%
        }

        .col-12 {
            flex: 0 0 auto;
            width: 100%
        }

        @media (min-width:576px) {
            .col-sm-6 {
                flex: 0 0 auto;
                width: 50%
            }
        }

        @media (min-width:1200px) {
            legend {
                font-size: 1.5rem
            }

            .col-xl-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin-bottom: 0;
            padding-left: 0
        }

        .nav-link {
            color: #0e73cc;
            display: block;
            padding: .5rem 1rem;
            text-decoration: none
        }

        .navbar {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-bottom: .5rem;
            padding-top: .5rem;
            position: relative
        }

        .navbar>.container-fluid {
            align-items: center;
            display: flex;
            flex-wrap: inherit;
            justify-content: space-between
        }

        .navbar-brand {
            font-size: 1.171875rem;
            margin-right: 1rem;
            padding-bottom: 0;
            padding-top: 0;
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            list-style: none;
            margin-bottom: 0;
            padding-left: 0
        }

        .navbar-nav .nav-link {
            padding-left: 0;
            padding-right: 0
        }

        .navbar-collapse {
            align-items: center;
            flex-basis: 100%;
            flex-grow: 1
        }

        .navbar-toggler {
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0;
            font-size: 1.171875rem;
            line-height: 1;
            padding: .25rem .75rem
        }

        .navbar-toggler-icon {
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: 100%;
            display: inline-block;
            height: 1.5em;
            vertical-align: middle;
            width: 1.5em
        }

        @media (min-width:992px) {
            #website-navbar {
                box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)
            }

            #website-navbar .navbar-nav {
                margin-top: 0
            }

            #website-navbar .navbar-nav .nav-link {
                font-size: .8125rem;
                height: 100%;
                padding-left: .75rem;
                padding-right: .75rem
            }

            #website-navbar .navbar-brand {
                font-size: 1.0625rem;
                margin-bottom: 0
            }

            #navbar-left-wrapper {
                display: block
            }

            #navbar-left-wrapper~.container-fluid {
                padding-left: 15.125rem
            }

            .navbar-expand-lg {
                flex-wrap: nowrap;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-left: 1rem;
                padding-right: 1rem
            }

            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }
        }

        .navbar-light .navbar-toggler {
            border-color: rgba(0, 0, 0, .1);
            color: rgba(0, 0, 0, .55)
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .navbar-dark .navbar-brand {
            color: #fff
        }

        .navbar-dark .navbar-nav .nav-link {
            color: hsla(0, 0%, 100%, .65)
        }

        .navbar-dark .navbar-toggler {
            border-color: hsla(0, 0%, 100%, .1);
            color: hsla(0, 0%, 100%, .65)
        }

        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .collapse:not(.show) {
            display: none
        }

        .fixed-top {
            top: 0
        }

        .fixed-top {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 1030
        }

        .visually-hidden {
            clip: rect(0, 0, 0, 0) !important;
            border: 0 !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            white-space: nowrap !important;
            width: 1px !important
        }

        .d-block {
            display: block !important
        }

        .d-flex {
            display: flex !important
        }

        .d-none {
            display: none !important
        }

        .shadow {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .flex-wrap {
            flex-wrap: wrap !important
        }

        .justify-content-end {
            justify-content: flex-end !important
        }

        .justify-content-center {
            justify-content: center !important
        }

        .align-items-center {
            align-items: center !important
        }

        .m-0 {
            margin: 0 !important
        }

        .my-3 {
            margin-bottom: 1rem !important;
            margin-top: 1rem !important
        }

        .me-2 {
            margin-right: .5rem !important
        }

        .me-3 {
            margin-right: 1rem !important
        }

        .mb-0 {
            margin-bottom: 0 !important
        }

        .mb-2 {
            margin-bottom: .5rem !important
        }

        .mb-4 {
            margin-bottom: 1.5rem !important
        }

        .ms-2 {
            margin-left: .5rem !important
        }

        .ms-3 {
            margin-left: 1rem !important
        }

        .ms-auto {
            margin-left: auto !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important
        }

        .px-2 {
            padding-left: .5rem !important;
            padding-right: .5rem !important
        }

        .px-3 {
            padding-left: 1rem !important;
            padding-right: 1rem !important
        }

        .py-2 {
            padding-bottom: .5rem !important;
            padding-top: .5rem !important
        }

        .pb-6 {
            padding-bottom: 6.25rem !important
        }

        .text-center {
            text-align: center !important
        }

        .text-white {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important
        }

        .bg-dark {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-white {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important
        }

        @media (min-width:768px) {
            .text-md-start {
                text-align: left !important
            }
        }

        @media (min-width:992px) {
            .d-lg-flex {
                display: flex !important
            }

            .d-lg-none {
                display: none !important
            }

            .mt-lg-3 {
                margin-top: 1rem !important
            }

            .px-lg-0 {
                padding-left: 0 !important;
                padding-right: 0 !important
            }
        }

        @media (min-width:1200px) {
            .d-xl-none {
                display: none !important
            }
        }

        .has-icon {
            position: relative
        }

        .has-icon:before {
            background-position: 50%;
            background-repeat: no-repeat;
            border-radius: 3px 0 0 3px;
            display: inline-block;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 50px
        }

        .grid .card {
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
            color: #38352f;
            display: block;
            margin: 0 0 2rem;
            min-height: 60px;
            padding: 20px;
            position: relative
        }

        .grid .card .badge {
            font-size: 12px;
            margin-top: -9px;
            position: absolute;
            right: 20px;
            top: 50%
        }

        .grid .card.bg-bs4 {
            background-color: #0e73cc
        }

        .grid .card.bg-bs4 .badge {
            background: #094b84
        }

        .grid .card.bg-bs4 .item {
            color: #fff
        }

        .grid .card.bg-bs5 {
            background-color: #3f51b5
        }

        .grid .card.bg-bs5 .badge {
            background: #2b387c
        }

        .grid .card.bg-bs5 .item {
            color: #fff
        }

        .grid .card.bg-bulma {
            background-color: #00d1b2
        }

        .grid .card.bg-bulma .badge {
            background: #008571
        }

        .grid .card.bg-bulma .item {
            color: #000
        }

        .grid .card.bg-foundation {
            background-color: #1779ba
        }

        .grid .card.bg-foundation .badge {
            background: #0f4d76
        }

        .grid .card.bg-foundation .item {
            color: #fff
        }

        .grid .card.bg-material-bootstrap {
            background-color: #e85183
        }

        .grid .card.bg-material-bootstrap .badge {
            background: #d11c58
        }

        .grid .card.bg-material-bootstrap .item {
            color: #000
        }

        .grid .card.bg-material {
            background-color: #e8797c
        }

        .grid .card.bg-material .badge {
            background: #dd383c
        }

        .grid .card.bg-material .item {
            color: #000
        }

        .grid .card.bg-tailwind {
            background-color: #38bdf8
        }

        .grid .card.bg-tailwind .badge {
            background: #089bdc
        }

        .grid .card.bg-tailwind .item {
            color: #000
        }

        .grid .card.bg-uikit {
            background-color: #73bbff
        }

        .grid .card.bg-uikit .badge {
            background: #2796ff
        }

        .grid .card.bg-uikit .item {
            color: #000
        }

        .grid .card .item {
            font-size: 1.0625rem
        }

        .grid .card.has-icon {
            border: none;
            padding-left: 85px;
            padding-right: 95px
        }

        .grid .card.has-icon:before {
            align-items: center;
            border-radius: .25rem 0 0 .25rem;
            color: #fff;
            display: flex;
            font-family: icomoon;
            font-size: 1.75rem;
            height: 100%;
            justify-content: center;
            width: 54px
        }

        .grid .card.has-icon:after {
            border-style: solid;
            border-width: 6px 0 6px 6px;
            content: " ";
            height: 0;
            left: 54px;
            position: absolute;
            top: calc(50% - 6px);
            width: 0
        }

        .grid .card.has-icon.bg-bs4:before {
            background: #094b84;
            text-shadow: 1px 1px 3px #04223d
        }

        .grid .card.has-icon.bg-bs4:after {
            border-color: transparent transparent transparent #094b84
        }

        .grid .card.has-icon.bg-bs5:before {
            background: #2b387c;
            text-shadow: 1px 1px 3px #171e44
        }

        .grid .card.has-icon.bg-bs5:after {
            border-color: transparent transparent transparent #2b387c
        }

        .grid .card.has-icon.bg-bulma:before {
            background: #008571;
            text-shadow: 1px 1px 3px #003830
        }

        .grid .card.has-icon.bg-bulma:after {
            border-color: transparent transparent transparent #008571
        }

        .grid .card.has-icon.bg-foundation:before {
            background: #0f4d76;
            text-shadow: 1px 1px 3px #062032
        }

        .grid .card.has-icon.bg-foundation:after {
            border-color: transparent transparent transparent #0f4d76
        }

        .grid .card.has-icon.bg-material-bootstrap:before {
            background: #d11c58;
            text-shadow: 1px 1px 3px #8d133b
        }

        .grid .card.has-icon.bg-material-bootstrap:after {
            border-color: transparent transparent transparent #d11c58
        }

        .grid .card.has-icon.bg-material:before {
            background: #dd383c;
            text-shadow: 1px 1px 3px #ab1d21
        }

        .grid .card.has-icon.bg-material:after {
            border-color: transparent transparent transparent #dd383c
        }

        .grid .card.has-icon.bg-tailwind:before {
            background: #089bdc;
            text-shadow: 1px 1px 3px #056792
        }

        .grid .card.has-icon.bg-tailwind:after {
            border-color: transparent transparent transparent #089bdc
        }

        .grid .card.has-icon.bg-uikit:before {
            background: #2796ff;
            text-shadow: 1px 1px 3px #0070d9
        }

        .grid .card.has-icon.bg-uikit:after {
            border-color: transparent transparent transparent #2796ff
        }

        #website-navbar {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
            font-family: Roboto Condensed
        }

        #website-navbar .navbar-nav {
            align-items: stretch;
            display: flex;
            flex-wrap: nowrap;
            margin-top: 1rem;
            width: 100%
        }

        #website-navbar .navbar-nav .nav-item {
            align-items: stretch;
            flex-grow: 1;
            justify-content: center;
            line-height: 1.25rem
        }

        #website-navbar .navbar-nav .nav-link {
            align-items: center;
            display: flex;
            flex-direction: column;
            font-size: .875rem;
            justify-content: center;
            padding: .5rem 1rem;
            text-align: center;
            text-transform: uppercase
        }

        #navbar-left-wrapper {
            background-color: #2a2926;
            box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24);
            display: none;
            height: 100%;
            padding-right: 0;
            position: fixed;
            top: 72px;
            width: 14.375rem;
            z-index: 9999;
            z-index: 2
        }

        #navbar-left-wrapper #navbar-left-collapse {
            display: none
        }

        @media (min-width:992px) {
            #website-navbar {
                box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)
            }

            #website-navbar .navbar-nav {
                margin-top: 0
            }

            #website-navbar .navbar-nav .nav-link {
                font-size: .8125rem;
                height: 100%;
                padding-left: .75rem;
                padding-right: .75rem
            }

            #website-navbar .navbar-brand {
                font-size: 1.0625rem;
                margin-bottom: 0
            }

            #navbar-left-wrapper {
                display: block
            }

            #navbar-left-wrapper~.container-fluid {
                padding-left: 15.125rem
            }
        }

        @media (max-width:991.98px) {
            #navbar-left-toggler-wrapper {
                display: inline-block;
                top: 4.75rem;
                width: 54px;
                z-index: 1 !important
            }

            #navbar-left-wrapper #navbar-left-collapse {
                display: block
            }

            .w3-animate-left {
                -webkit-animation: .4s animateleft;
                animation: .4s animateleft;
                position: relative
            }

            @-webkit-keyframes animateleft {
                0% {
                    left: -14.375rem;
                    opacity: 0
                }

                to {
                    left: 0;
                    opacity: 1
                }
            }

            @keyframes animateleft {
                0% {
                    left: -14.375rem;
                    opacity: 0
                }

                to {
                    left: 0;
                    opacity: 1
                }
            }
        }

        [data-simplebar] {
            align-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: flex-start;
            position: relative
        }

        #share-wrapper {
            height: 40px;
            position: absolute;
            right: 50px;
            top: 37px;
            transform: translateY(-50%);
            z-index: 1050
        }

        #share-wrapper ul {
            left: calc(-50% + 22.5px);
            position: relative;
            width: 90px
        }

        #share-wrapper ul li {
            width: 45px
        }

        #share-wrapper label,
        #share-wrapper li>a {
            border-radius: 50%;
            color: #efefef;
            height: 2.5rem;
            overflow: hidden;
            text-decoration: none;
            width: 2.5rem
        }

        #share-wrapper label#share {
            background: #4267b2;
            opacity: .75;
            position: relative;
            z-index: 14
        }

        #share-wrapper li>a#share-facebook {
            background: #3b5998
        }

        #share-wrapper li>a#share-twitter {
            background: #00acee
        }

        #share-wrapper li>a#share-pinterest {
            background: #e4405f
        }

        #share-wrapper li>a#share-linkedin {
            background: #0077b5
        }

        #share-wrapper li>a#share-reddit {
            background: #ff4500
        }

        #share-wrapper li>a#share-google-bookmarks {
            background: #4285f4
        }

        #share-wrapper li>a#share-mix {
            background: #ff8226
        }

        #share-wrapper li>a#share-pocket {
            background: #ee4056
        }

        #share-wrapper li>a#share-digg {
            background: #2a2a2a
        }

        #share-wrapper li>a#share-blogger {
            background: #fda352
        }

        #share-wrapper li>a#share-tumblr {
            background: #35465c
        }

        #share-wrapper li>a#share-flipboard {
            background: #c00
        }

        #share-wrapper li>a#share-hacker-news {
            background: #f60
        }

        #share-wrapper li:first-child {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 13
        }

        #share-wrapper li:nth-child(2) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 12
        }

        #share-wrapper li:nth-child(3) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 11
        }

        #share-wrapper li:nth-child(4) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 10
        }

        #share-wrapper li:nth-child(5) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 9
        }

        #share-wrapper li:nth-child(6) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 8
        }

        #share-wrapper li:nth-child(7) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 7
        }

        #share-wrapper li:nth-child(8) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 6
        }

        #share-wrapper li:nth-child(9) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 5
        }

        #share-wrapper li:nth-child(10) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 4
        }

        #share-wrapper li:nth-child(11) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 3
        }

        #share-wrapper li:nth-child(12) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 2
        }

        #share-wrapper li:nth-child(13) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 1
        }

        #share-wrapper input~ul {
            visibility: hidden
        }

        @media only screen and (min-width:992px) {
            #share-wrapper {
                position: fixed;
                right: 0;
                top: 180px
            }

            #share-wrapper label#share {
                right: -42px
            }
        }

        :target {
            scroll-margin-top: 100px
        }

        html {
            font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            min-height: 100%;
            position: relative
        }

        @media screen and (prefers-reduced-motion:reduce) {
            html {
                overflow-anchor: none;
                scroll-behavior: auto
            }
        }

        body {
            counter-reset: section
        }

        .h3,
        .h4,
        h1,
        h4 {
            font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol
        }

        h1 {
            color: #0e73cc;
            line-height: .9;
            margin-bottom: 2.5rem
        }

        h1:first-letter {
            font-size: 2em
        }

        .h3 {
            color: #2a2926
        }

        .h4,
        h4 {
            color: #55524c;
            font-weight: 300 !important
        }

        .h3 {
            margin-bottom: 1.5rem
        }

        .h4,
        h4 {
            margin-bottom: 1rem
        }

        a {
            text-decoration: none
        }

        #filter-forms#filter-forms legend {
            border-bottom: 1px solid #d4d1cc;
            color: #fff;
            font-variant: small-caps;
            font-weight: 400;
            margin-bottom: .5rem
        }

        #filter-forms#filter-forms .h4 {
            color: #bfbab2;
            font-variant: small-caps
        }

        #filter-forms#filter-forms .material-form [type=checkbox]+span:not(.lever),
        #filter-forms#filter-forms .material-form [type=radio]:checked+span,
        #filter-forms#filter-forms .material-form [type=radio]:not(:checked)+span {
            font-size: .875rem
        }

        #filter-forms#filter-forms label {
            font-weight: 300;
            margin-bottom: 0
        }

        #filter-forms#filter-forms label [type=checkbox]:checked+span,
        #filter-forms#filter-forms label [type=radio]:checked+span {
            color: hsla(0, 0%, 100%, .9)
        }

        #filter-forms#filter-forms label [type=radio]:not(:checked)+span {
            color: hsla(0, 0%, 100%, .7)
        }

        .badge:not(.badge-circle) {
            border-radius: 0
        }

        .condensed {
            font-family: Roboto Condensed
        }

        .bi:before,
        [class*=" bi-"]:before {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-family: bootstrap-icons !important;
            font-style: normal;
            font-variant: normal;
            font-weight: 400 !important;
            line-height: 1;
            text-transform: none;
            vertical-align: -.125em
        }

        .bi-share-fill:before {
            content: "\f52d"
        }

        .bi-x-lg:before {
            content: "\f659"
        }

        [class*=" icon-"],
        [class^=icon-] {
            font-family: icomoon;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            font-display: swap;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .icon-lifebuoy:before {
            content: "\e941"
        }

        .icon-mail:before {
            content: "\f03b"
        }

        .icon-checkbox-unchecked:before {
            content: "\ea53"
        }

        .icon-dynamic:before {
            content: "\e982"
        }

        .icon-food:before {
            content: "\e600"
        }

        .material-form .row {
            display: block
        }

        html {
            box-sizing: border-box
        }

        *,
        :after,
        :before {
            box-sizing: inherit
        }

        .material-form input {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif
        }

        .material-form .row {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px
        }

        .material-form .row:after {
            content: "";
            display: table;
            clear: both
        }

        .material-form .row .col {
            float: left;
            box-sizing: border-box;
            padding: 0 .75rem;
            min-height: 1px
        }

        .material-form .row .col.s12 {
            width: 100%;
            margin-left: auto;
            left: auto;
            right: auto
        }

        .material-form label {
            font-size: .8rem;
            color: #9e9e9e
        }

        .material-form ::-webkit-input-placeholder {
            color: #d1d1d1
        }

        .material-form :-ms-input-placeholder,
        .material-form ::-ms-input-placeholder {
            color: #d1d1d1
        }

        .material-form .input-field {
            position: relative;
            margin-top: 1rem;
            margin-bottom: 1rem
        }

        .material-form .input-field.col label {
            left: .75rem
        }

        .material-form [type=radio]:checked,
        .material-form [type=radio]:not(:checked) {
            position: absolute;
            opacity: 0
        }

        .material-form [type=radio]:checked+span,
        .material-form [type=radio]:not(:checked)+span {
            position: relative;
            padding-left: 35px;
            display: inline-block;
            height: 25px;
            line-height: 25px;
            font-size: 1rem
        }

        .material-form [type=radio]+span:after,
        .material-form [type=radio]+span:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            margin: 4px;
            width: 16px;
            height: 16px;
            z-index: 0
        }

        .material-form [type=radio].with-gap:checked+span:after,
        .material-form [type=radio].with-gap:checked+span:before,
        .material-form [type=radio]:checked+span:after,
        .material-form [type=radio]:checked+span:before,
        .material-form [type=radio]:not(:checked)+span:after,
        .material-form [type=radio]:not(:checked)+span:before {
            border-radius: 50%
        }

        .material-form [type=radio]:not(:checked)+span:after,
        .material-form [type=radio]:not(:checked)+span:before {
            border: 2px solid #5a5a5a
        }

        .material-form [type=radio]:not(:checked)+span:after {
            transform: scale(0)
        }

        .material-form [type=radio]:checked+span:before {
            border: 2px solid transparent
        }

        .material-form [type=radio].with-gap:checked+span:after,
        .material-form [type=radio].with-gap:checked+span:before,
        .material-form [type=radio]:checked+span:after {
            border: 2px solid #26a69a
        }

        .material-form [type=radio].with-gap:checked+span:after,
        .material-form [type=radio]:checked+span:after {
            background-color: #26a69a
        }

        .material-form [type=radio]:checked+span:after {
            transform: scale(1.02)
        }

        .material-form [type=radio].with-gap:checked+span:after {
            transform: scale(.5)
        }

        .material-form [type=checkbox]:checked {
            position: absolute;
            opacity: 0
        }

        .material-form [type=checkbox]+span:not(.lever) {
            position: relative;
            padding-left: 35px;
            display: inline-block;
            height: 25px;
            line-height: 25px;
            font-size: 1rem
        }

        .material-form [type=checkbox]+span:not(.lever):before,
        .material-form [type=checkbox]:not(.filled-in)+span:not(.lever):after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 18px;
            height: 18px;
            z-index: 0;
            border: 2px solid #5a5a5a;
            border-radius: 1px;
            margin-top: 3px
        }

        .material-form [type=checkbox]:not(.filled-in)+span:not(.lever):after {
            border: 0;
            transform: scale(0)
        }

        .material-form [type=checkbox]:checked+span:not(.lever):before {
            top: -4px;
            left: -5px;
            width: 12px;
            height: 22px;
            border-top: 2px solid transparent;
            border-left: 2px solid transparent;
            border-right: 2px solid #26a69a;
            border-bottom: 2px solid #26a69a;
            transform: rotate(40deg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transform-origin: 100% 100%
        }
    </style>
    <?php require_once '../documentation/inc/css-includes.php'; ?>
    <link rel="preload" href="../documentation/assets/stylesheets/icomoon.min.css" as="style" onload="this.onload = null; this.rel = 'stylesheet' ; ">
    <link rel="preload" href="../documentation/assets/fonts/icomoon.ttf?rnh868" as="font" crossorigin="*">
    <?php $toggleTemplates->printIncludes('css'); ?>
</head>

<body style="padding-top:76px;" data-target="#navbar-left-wrapper" data-offset="180">

    <!-- Discount -->

    <div id="discount"></div>

    <!-- Main navbar -->

    <nav id="website-navbar" class="navbar navbar-dark bg-dark navbar-expand-lg px-2 px-lg-0 fixed-top">

        <div class="container-fluid px-0">
            <a class="navbar-brand me-3" href="../"><img src="../documentation/assets/images/phpformbuilder-logo.png" width="60" height="60" class="me-3" alt="PHP Form Builder" title="PHP Form Builder">PHP Form Builder</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navcol-1">

                <ul class="nav navbar-nav ms-auto">

                    <!-- https://www.phpformbuilder.pro navbar -->

                    <li class="nav-item"><a class="nav-link" href="../">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../drag-n-drop-form-builder/index.php">Drag &amp; drop Form Builder</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/quick-start-guide.php">Quick Start Guide</a></li>
                    <li class="nav-item"><a class="nav-link" active href="../templates/index.php">Form Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/javascript-plugins.php">JavaScript plugins</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/code-samples.php">Code Samples</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/class-doc.php">Class Doc.</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/functions-reference.php">Functions Reference</a></li>
                    <li class="nav-item"><a class="nav-link" href="../documentation/help-center.php">Help Center</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main sidebar -->

    <div id="navbar-left-toggler-wrapper" class="navbar-light fixed-top p-2 d-lg-none d-xl-none">
        <button id="navbar-left-toggler" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>

    <div id="navbar-left-wrapper" class="w3-animate-left pb-6" data-simplebar>
        <a href="#" id="navbar-left-collapse" class="d-flex justify-content-end d-lg-none d-xl-none text-white p-4"><i class="bi bi-x-lg"></i></a>
        <div id="filter-forms" class="px-3 py-2">
            <p class="h4 my-3">filter form list</p>
            <a href="#" id="toggle-all-forms" class="btn btn-success text-white d-block shadow btn-toggle mb-4"><span class="icon-checkbox-unchecked me-2"></span>Toggle All</a>
            <?php $toggleTemplates->render(); ?>
        </div>
        <!-- navbar-left -->
    </div>
    <!-- /main sidebar -->

    <main class="container-fluid mt-5 mt-lg-3">
        <h1 id="main-title" class="text-center text-lg-start"><?php echo $title; ?></h1>

        <p class="h4 ms-2 mt-lg-3">
            <i id="show-hide-icon" class="bi bi-arrow-left-square-fill text-secondary me-1"></i> Use the left nav to filter the items
        </p>
        <div class="alert alert-light border alert-dismissible fade show" role="alert">
            <p>On this page you will find hundreds of form templates of all kinds. Filters in the side menu enable you to choose a preferred framework (Bootstrap, Bulma, Foundation, Material, Tailwind and UIKit). You can also select different types of forms and plugins.</p>
            <p>Click on the "Toggle All" button to deselect everything and then choose the forms and plugins you want.</p>
            <p class="mb-0">The forms open in a new tab. You can test them and see the PHP source code.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>

        <div class="grid row">
            <div class="col">
                <div id="choose-hint" class="card bg-bs5 icon-lifebuoy has-icon ms-3" style="display:none;">
                    <p class="h4 text-white mb-0">Choose at least one Framework and one form/plugin</p>
                </div>
            </div>
        </div>
        <div class="grid row" id="grid-forms">
            <?php echo $list; ?>
        </div>
    </main>
    <?php require_once '../documentation/inc/js-includes.php'; ?>
    <?php $toggleTemplates->printIncludes('js'); ?>

    <script>
        loadjs([
            'assets/js/isotope.pkgd.min.js'
        ], 'isotope');
        loadjs.ready(['core', 'isotope'], function() {
            /* jshint jquery: true, browser: true */
            'use strict';

            const $gridForms = document.getElementById('grid-forms');

            var mainTitle = {
                framework: document.querySelector('#filter-forms input[name="templates-framework"]:checked').getAttribute('data-title'),
                forms: ''
            };

            // isotope
            const iso = new Isotope($gridForms, {
                itemSelector: '.grid-item',
                layoutMode: 'masonry'
            });

            const updateToggleFormsBtn = function() {
                const $toggleAllFormsSpan = document.querySelector('#toggle-all-forms span');
                if ($gridForms.querySelector('.framework-on.active') !== null) {
                    $toggleAllFormsSpan.classList.remove('icon-check-square-o');
                    $toggleAllFormsSpan.classList.add('icon-checkbox-unchecked');
                } else {
                    $toggleAllFormsSpan.classList.add('icon-check-square-o');
                    $toggleAllFormsSpan.classList.remove('icon-checkbox-unchecked');
                }
            };

            const chooseHint = function() {
                const $chooseHint = document.getElementById('choose-hint');
                if ($gridForms.querySelector('.framework-on.active') !== null) {
                    $chooseHint.style.display = 'none';
                } else {
                    $chooseHint.style.display = 'block';
                }
            };

            const filterFramework = function() {

                // remove unchecked framework(s)
                document.querySelectorAll('input[name="templates-framework"]').forEach(function($el) {
                    if ($el.checked === true) {
                        $gridForms.querySelectorAll('.' + $el.value).forEach(function($el) {
                            $el.classList.add('framework-on');
                        });
                    } else {
                        $gridForms.querySelectorAll('.' + $el.value).forEach(function($el) {
                            $el.classList.remove('framework-on');
                        });
                    }
                });

                // store user's preference
                fetch(
                        'assets/ajax-prefered-framework.php', {
                            method: 'POST',
                            body: 'framework=' + encodeURIComponent(document.querySelector('input[name="templates-framework"]:checked').value),
                            headers: {
                                'Content-type': 'application/x-www-form-urlencoded'
                            }
                        })
                    .then()
                    .catch((error) => {
                        console.log(error);
                    });
            };

            const setSearchParam = function(key, value) {
                if (!window.history.pushState || !key) {
                    return;
                }

                let url = new URL(window.location.href);
                var params = new window.URLSearchParams(window.location.search);

                if (value === undefined || value === null) {
                    params.delete(key);
                } else {
                    if (key !== 'framework') {
                        params.set('framework', document.querySelector('#filter-forms input[name="templates-framework"]:checked').value);
                    }
                    params.set(key, value);
                }
                url.search = params;
                url = url.toString();
                window.history.replaceState({
                    url: url
                }, null, url);
            }

            const updateMainTitle = function() {
                let title = mainTitle.framework;
                if (mainTitle.forms.length > 0) {
                    title += '<br><small class="ms-1"> - ' + mainTitle.forms + '</small>';
                } else {
                    title += ' forms';
                }
                document.getElementById('main-title').innerHTML = title;
            }

            // Filter all
            document.getElementById('toggle-all-forms').addEventListener('click', function(e) {
                const $target = document.getElementById('toggle-all-forms');
                e.preventDefault();
                if ($gridForms.querySelector('.active') !== null) {
                    document.querySelectorAll('#filter-forms .checkbox input').forEach(function($el) {
                        $el.checked = '';
                    });
                    $target.classList.remove('btn-success');
                    $target.classList.add('btn-danger');
                } else {
                    document.querySelectorAll('#filter-forms .checkbox input').forEach(function($el) {
                        $el.checked = 'checked';
                    });
                    $target.classList.remove('btn-danger');
                    $target.classList.add('btn-success');
                }
                const event = document.createEvent('HTMLEvents');
                event.initEvent('change', true, false);
                document.querySelectorAll('#filter-forms input').forEach(function($el) {
                    $el.dispatchEvent(event);
                });
                updateToggleFormsBtn();
                chooseHint();
            });

            // filter by template/plugin
            document.querySelectorAll('#filter-forms input:not([name="templates-framework"]):not([type="hidden"])').forEach(function($el) {
                $el.addEventListener('change', function(e) {
                    // if toggle all => e.isTrusted = false
                    if (e.isTrusted && e.target.name === 'templates-chk[]') {
                        const $checkedTemplates = document.querySelectorAll('input[name="templates-chk[]"]:checked');
                        let activeFormsValue = null;
                        mainTitle.forms = '';
                        if ($checkedTemplates.length === 1) {
                            activeFormsValue = $checkedTemplates[0].value;
                            mainTitle.forms = $checkedTemplates[0].getAttribute('data-title');
                        }
                        setSearchParam('forms', activeFormsValue);
                        updateMainTitle();
                    }
                    if ($el.checked) {
                        $gridForms.querySelectorAll('.' + $el.value).forEach(function($el) {
                            $el.classList.add('active');
                        });
                    } else {
                        $gridForms.querySelectorAll('.' + $el.value).forEach(function($el) {
                            $el.classList.remove('active');
                        });
                    }

                    iso.arrange({
                        // item element provided as argument
                        filter: '.grid-item.framework-on.active'
                    });

                    updateToggleFormsBtn();
                    chooseHint();
                });
            });

            // filter by framework
            document.querySelectorAll('#filter-forms input[name="templates-framework"]').forEach(function($el) {
                $el.addEventListener('click', function() {
                    filterFramework();
                    iso.arrange({
                        // item element provided as argument
                        filter: '.grid-item.framework-on.active'
                    });
                    updateToggleFormsBtn();
                    chooseHint();
                    setSearchParam('framework', $el.value);
                    mainTitle.framework = $el.getAttribute('data-title');
                    updateMainTitle();
                });
            });

            // onload
            filterFramework();
            iso.arrange({
                // item element provided as argument
                filter: '.grid-item.framework-on.active'
            });
            updateToggleFormsBtn();
            chooseHint();

            <?php
            if (isset($_GET['forms']) && preg_match('`[a-z-]+`', $_GET['forms'])) { ?>
                const $formTarget = document.querySelector('input[name="templates-chk[]"][value="<?php echo $_GET['forms'] ?>"]');
                if ($formTarget) {
                    const event2 = document.createEvent('HTMLEvents');
                    event2.initEvent('click', true, false);
                    document.getElementById('toggle-all-forms').dispatchEvent(event2);
                    $formTarget.checked = true;
                    const event3 = document.createEvent('HTMLEvents');
                    event3.initEvent('change', true, false);
                    $formTarget.dispatchEvent(event3);
                    setSearchParam('forms', '<?php echo $_GET['forms']; ?>');
                }
            <?php }
            ?>
        });
    </script>
</body>

</html>