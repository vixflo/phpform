<?php

/**
 * @param string $source_dir
 * @param string[] $authorized_ext
 * @param int $directory_depth
 * @param bool $hidden
 * @return mixed
 */
function scanRecursively(string $source_dir, array $authorized_ext, int $directory_depth = 5, bool $hidden = false): mixed
{
    if ($fp = opendir($source_dir)) {
        $filedata   = [];
        $new_depth  = $directory_depth - 1;
        $source_dir = rtrim($source_dir, '/') . '/';

        while (false !== ($file = readdir($fp))) {
            // Remove '.', '..', and hidden files [optional]
            if (!trim($file, '.') || (!$hidden && $file[0] == '.')) {
                continue;
            }

            if (($directory_depth < 1 || $new_depth > 0) && is_dir($source_dir . $file)) {
                $filedata[$file] = scanRecursively($source_dir . $file . '/', $authorized_ext, $new_depth, $hidden);
            } elseif (isAuthorized($file, $authorized_ext)) {
                $filedata[] = [
                    'ext'  => pathinfo($file, PATHINFO_EXTENSION),
                    'name' => $file,
                    'size' => filesize($source_dir . $file)
                ];
            }
        }

        closedir($fp);
        return $filedata;
    }
    echo 'can not open dir';
    return false;
}

/**
 * @param string $file
 * @param string[] $authorized_ext
 * @return bool
 */
function isAuthorized(string $file, array $authorized_ext): bool
{
    $ext = '.' . pathinfo($file, PATHINFO_EXTENSION);
    if ($authorized_ext[0] === '.*' || in_array($ext, $authorized_ext, true)) {
        return true;
    }

    return false;
}
