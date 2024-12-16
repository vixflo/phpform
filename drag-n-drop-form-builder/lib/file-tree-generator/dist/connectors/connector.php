<?php
//
// jQuery File Tree PHP Connector
//
// Version 1.01
//
// Cory S.N. LaViska
// A Beautiful Site (https://abeautifulsite.net/)
// 24 March 2008
//
// History:
//
// 1.01 - updated to work with foreign characters in directory/file names (12 April 2008)
// 1.00 - released (24 March 2008)
//
// Output a list of files for jQuery File Tree
//

require_once __DIR__ . 'connector-functions.php';

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
$main_dir = $root . rtrim(urldecode($_POST['dir']), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
$authorized_ext = array_values(json_decode(stripslashes($_POST['ext']), true));
if (file_exists($main_dir)) {
    $filedata = scanRecursively($main_dir, $authorized_ext);
    echo json_encode($filedata);
} else {
    echo 'cannot open dir ' . $main_dir;
}
