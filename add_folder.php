<?php
include 'funcs.php';
$location = $_POST['location'];
$dir_name = get_actual_path($location) . "/" . "nowy_folder";
while (is_dir($dir_name)) {
    $dir_name .= 1;
}
mkdir($dir_name);
exit(header("Location: index.php?location=$location"));
?>