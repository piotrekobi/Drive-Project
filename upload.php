<?php
include 'funcs.php';
$location = $_POST['location'];
$target_file = get_actual_path($location) . "/" . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    exit(header("Location: index.php?location=$location"));
} else {
    exit("Przy przesyłaniu pliku wystąpił błąd.");
}
?>