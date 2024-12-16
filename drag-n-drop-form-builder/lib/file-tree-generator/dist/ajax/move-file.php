<?php
$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

require_once __DIR__ . '/move-file-functions.php';
// var_dump($_POST);
foreach ($_POST as $key => $value) {
    ${$key} = urldecode(stripslashes($_POST[$key]));
}

$authorized_ext = [];

if (isset($ext)) {
    $ext = json_decode($ext);
    $authorized_ext = array_values($ext);
}

if (
    !isset($filename) ||
    !isset($filepath) ||
    !isset($destpath) ||
    !isset($filehash) ||
    !preg_match('`[a-z0-9]+`', $filehash) ||
    preg_match('`\.\.|\*`', $filepath) ||
    preg_match('`\.\.|\*`', $destpath)
) {
    exit('1');
}

$salt = '%t$qPP';
if (hash('sha256', $filepath . $salt) !== $filehash) {
    exit('2');
}

$rootfilepath = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $root . $filepath);
$rootdestpath = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $root . $destpath);

if (!file_exists(($rootfilepath))) {
    exit('3');
}
if (!isAuthorized($filename, $authorized_ext)) {
    exit('4');
}

// Security checks ok

$out = array();

if (!copy($rootfilepath, $rootdestpath)) {
    $out = array(
        'status' => 'danger',
        'msg'    => 'Failed to copy ' . $rootdestpath
    );
} else {
    if (!unlink($rootfilepath)) {
        $out = array(
            'status' => 'danger',
            'msg'    => 'Failed to delete ' . $rootfilepath
        );
    } else {
        $out = array(
            'status' => 'success',
            'msg'    => ''
        );
    }
}
