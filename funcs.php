<?php
function listFiles($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    foreach ($files as $file) {
        echo "<br><a href=\"$dir\\$file\">$file</a>";
    }
}
?>