<?php
include 'funcs.php';
try{
    if ($_FILES["fileToUpload"]["error"] == 0){
        $location = $_POST['location'];
        $target_file = get_actual_path($location) . "/" . basename($_FILES["fileToUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("Location: index.php?location=$location");
            exit ;
        } else {
            exit("Przy przesyłaniu pliku wystąpił błąd.");
        }
    }
    else {
        exit("Nie można przesłać pliku");
    }
} catch (Exception $e) {
    exit("Nie można przesłać pliku");
}
?>