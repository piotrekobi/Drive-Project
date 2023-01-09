<?php include 'funcs.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <?php include "shared/head.php"; ?>
    <title>Drive</title>
</head>

<body>
    <div class="container-fluid px-1 vh-100">
        <?php include "shared/header_bar.php"; ?>
        <main class="h-75 align-content-center pt-3">
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                include 'views/disk.php';
            } else {
                include 'views/home.php';
            } ?>

        </main>
    </div>
</body>

</html>