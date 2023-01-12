<?php
include "funcs.php";
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "shared/head.php"; ?>
    <title>Podgląd</title>
</head>
<body>
    Hello world
    <button type="button" class="btn btn-primary">Primary</button>
    <?php print($_GET['file']);
    $TTT = $_GET['file'];
    $LOL = "<img class='card-img-top' alt='' src='$TTT'>";
    print($LOL);
    ?>
    
</body>
</html>