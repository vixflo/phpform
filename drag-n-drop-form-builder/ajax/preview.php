<?php

use formgenerator\FormGenerator;

session_start();
include_once '../../phpformbuilder/autoload.php';
/* $json = json_decode($_POST['data']);
foreach ($json as $var => $val) {
    ${$var} = $val;
    echo '<h3 class="text-white fw-light bg-secondary px-2 py-1">' . $var . '</h3>';
    var_dump(${$var});
} */
if (!isset($_POST['data'])) {
    // If the preview form has been posted
    include_once 'preview-posted.html';
    exit;
}
$generator = new FormGenerator($_POST['data']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (!empty($generator->iconFontUrl)) { ?>
    <link rel="stylesheet" href="<?php echo $generator->iconFontUrl ?>">
    <?php }

    if ($generator->userForm->framework === 'tailwind') { ?>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <?php } ?>
</head>

<body>

    <div class="container">
        <p>&nbsp;</p>
        <?php $generator->outputPreview(); ?>
    </div>
    <!-- JavaScript -->
    <script src="../assets/javascripts/loadjs.min.js"></script>
    <script src="../assets/javascripts/preview-<?php echo $generator->userForm->framework; ?>.js"></script>
    <?php $generator->printJsCode(); ?>
    <?php if ($generator->userForm->framework === 'material') { ?>
    <script>
            loadjs.ready(["frameworks/material/material.min.js"], function() {
                var elems = document.querySelectorAll('select:not(.selectpicker):not(.select2)');
                var instances = M.FormSelect.init(elems);
            });
        </script>
    <?php } elseif ($generator->userForm->framework === 'bs4-material') { ?>
    <script>
            loadjs.ready(["frameworks/material/material.min.js", "materialize/dist/js/material-forms.min.js"], function() {
                var elems = document.querySelectorAll('select:not(.selectpicker):not(.select2)');
                var instances = M.FormSelect.init(elems);
            });
        </script>
    <?php } ?>
</body>

</html>
