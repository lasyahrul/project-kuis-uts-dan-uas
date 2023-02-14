<?php
function scanFile($dir, $namaFile)
{
    $files = scandir($dir);
    $status = 0;

    foreach ($files as $file) {
        if (strstr($file, $namaFile . ".php")) {
            $status = 1;
        }
    }

    return $status;
}
