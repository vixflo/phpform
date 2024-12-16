<?php
/**
 * @param mixed $file
 * @param mixed $authorized_ext
 * @return bool
 */
function isAuthorized($file, $authorized_ext): bool
{
    $ext = '.' . pathinfo($file, PATHINFO_EXTENSION);
    if ($authorized_ext[0] === '.*' || in_array($ext, $authorized_ext)) {
        return true;
    }

    return false;
}
