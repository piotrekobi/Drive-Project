<?php
$target_file = "files/" . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
    exit(header("Location:http://localhost:3300/index.php"));
} else {
    exit("Przy przesyłaniu pliku wystąpił błąd.");
}

?>