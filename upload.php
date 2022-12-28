<?php
$location = $_POST['location'];
$target_file = $location . "/" . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    exit(header("Location: index.php?location=$location"));
} else {
    exit("Przy przesyłaniu pliku wystąpił błąd.");
}
?>