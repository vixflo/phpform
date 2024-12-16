<?php

use phpformbuilder\Form;

session_start();

if (!isset($_POST['index']) || !is_numeric($_POST['index'])) {
    exit();
}

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

// define the form name globally
// (must be the same as the main calling form)
$formId = 'dynamic-fields-form-2';

$index = $_POST['index'];

// retrieve & register errors
if (isset($_SESSION['ajax-errors'][$formId])) {
    $_SESSION['errors'][$formId] = $_SESSION['ajax-errors'][$formId];
}

$form = new Form($formId, 'horizontal', 'novalidate', 'material');
$form->setMode('development');

$form->setCols(2, 3, 'md');
$form->groupElements('job-' . $index, 'person-' . $index, 'remove-btn');

$form->addOption('job-' . $index, '', 'Choose one ...', '', 'disabled selected');
$form->addOption('job-' . $index, 'Content writer', 'Content writer');
$form->addOption('job-' . $index, 'Tech Support / Technical Leader', 'Tech Support / Technical Leader');
$form->addOption('job-' . $index, 'Office Assistant', 'Office Assistant');
$form->addOption('job-' . $index, 'Secretary', 'Secretary');
$form->addOption('job-' . $index, 'Team Leader', 'Team Leader');
$form->addOption('job-' . $index, 'Data Analyst', 'Data Analyst');
$form->addOption('job-' . $index, 'Safety Officer', 'Safety Officer');
$form->addOption('job-' . $index, 'Delivery Boy', 'Delivery Boy');
$form->addOption('job-' . $index, 'Admin Assistant', 'Admin Assistant');
$form->addSelect('job-' . $index, 'Job ' . $index, 'required');

$form->addOption('person-' . $index, '', 'Choose one ...', '', 'disabled selected');
$form->addOption('person-' . $index, 'Adam Bryant', 'Adam Bryant');
$form->addOption('person-' . $index, 'Lillian Riley', 'Lillian Riley');
$form->addOption('person-' . $index, 'Paula Day', 'Paula Day');
$form->addOption('person-' . $index, 'Kelly Stephens', 'Kelly Stephens');
$form->addOption('person-' . $index, 'Russell Hawkins', 'Russell Hawkins');
$form->addOption('person-' . $index, 'Carl Watson', 'Carl Watson');
$form->addOption('person-' . $index, 'Judith White', 'Judith White');
$form->addOption('person-' . $index, 'Tina Cook', 'Tina Cook');
$form->addSelect('person-' . $index, 'Person ' . $index, 'required');

$form->setCols(0, 2, 'md');
$form->addBtn('button', 'remove-btn', '', '<i class="fas fa-minus-circle" aria-hidden="true"></i>', 'class=btn btn-danger waves-effect waves-light remove-element-button, data-index=' . $index);

/* render elements */

/* !!! Don't remove dynamic div, required to delete elements using jQuery !!! */

echo '<div class="dynamic" data-index="' . $index . '">' . $form->html . '</div>' . "\n";

?>
<script>
    // update the form token value with the new generated token
    document.querySelector('input[name="dynamic-fields-form-2-token"]').value = '<?php echo $_SESSION['dynamic-fields-form-2_token']; ?>';

    // enable the slimselect plugin for the new fields
    window.slimSelects['<?php echo 'job-' . $index; ?>'] = new SlimSelect({
        select: 'select[name="<?php echo 'job-' . $index; ?>"]'
    });
    window.slimSelects['<?php echo 'person-' . $index; ?>'] = new SlimSelect({
        select: 'select[name="<?php echo 'person-' . $index; ?>"]'
    });
</script>
