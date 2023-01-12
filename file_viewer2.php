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
    <div class="container-fluid px-1 vh-100">
        <?php include "shared/header_bar.php"; ?>
        <main class="h-75 align-content-center pt-3">
            <!-- Page content -->
            Hello world
            <button type="button" class="btn btn-primary">Primary</button>
            <?php print($_GET['file']);
            $TTT = $_GET['file'];
            $LOL = "<img class='card-img-top' alt='' src='$TTT'>";
            print($LOL);
            ?>
        </main>
    </div>
</body>

</html>