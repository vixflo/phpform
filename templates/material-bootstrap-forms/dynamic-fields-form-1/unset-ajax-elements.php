<?php
session_start();

if (!isset($_GET['job-index']) || !is_numeric($_GET['job-index'])) {
    exit();
}
$index = $_GET['job-index'];

$formId = 'dynamic-fields-form-1';
$fields = array(
    'job-' . $index,
    'person-' . $index
);

foreach ($fields as $field) {
    // unset removed fields from form required fields
    unset($_SESSION[$formId]['fields'][$field]);
    if (in_array($field, $_SESSION[$formId]['required_fields'])) {
        $key = array_search($field, $_SESSION[$formId]['required_fields']);
        unset($_SESSION[$formId]['required_fields'][$key]);
    }
    if (in_array($field, $_SESSION[$formId]['required_fields_conditions'])) {
        $key = array_search($field, $_SESSION[$formId]['required_fields_conditions']);
        unset($_SESSION[$formId]['required_fields_conditions'][$key]);
    }
}
