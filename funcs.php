<?php
function listFiles($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "<div class='container'>";
    foreach ($files as $file) {
        $html_code .= "<button class='fileButton' onclick=\"location.href='$dir/$file'\">
                      <img class='fileIcon' src='$dir/$file'>
                      <p>$file</p>
                      </button>";
    }

    $html_code .= "</div>";
    echo($html_code);
}
?>