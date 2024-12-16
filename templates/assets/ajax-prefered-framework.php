<?php
if(!isset($_POST['framework']) || !preg_match('`[a-z-]+`', $_POST['framework'])) {
    exit;
} else {
    setcookie('prefered_framework', $_POST['framework'], time() + (86400 * 30), "/");
    // echo avoids a failure msg in the browser console
    echo 'ok';
}
