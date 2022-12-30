<?php
include '../funcs.php';
date_default_timezone_set("Europe/Warsaw");
$img = $_POST['image'];
$location = $_POST['location'];
$folderPath = "../" . get_actual_path($location) . "/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);
$fileName = date('mdY_His', time()) . '.png';

$file = $folderPath . $fileName;

if (file_put_contents($file, $image_base64)) {
    exit(header("Location: ../index.php?location=$location"));
} else {
    exit("Przy dodawaniu zdjęcia wystąpił błąd.");
}
?>