<!DOCTYPE html>
<html>

<head>
    <?php include "../shared/head.php"; ?>
    <title>Zrób zdjęcie z kamery</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
</head>
<?php include "../shared/protected.php"; ?>
<body>
    <div class="container-fluid px-1 vh-100">
        <?php include "../shared/header_bar.php"; ?>
        <main class="h-75 align-content-center pt-3">
            <div class="container-fluid mt-3">
                <h1 class="text-center">
                    Zrób zdjęcie i zapisz obraz na dysku2
                </h1>
                <div class="row">
                    <!-- <div class="col-2">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                Opcje
                            </div>
                        </div>
                    </div> -->
                    <div class="col-10">
                        <!-- Zawartość -->
                        <form method="POST" action="storeImage.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="disk_camera"></div>
                                    <br />
                                    <input type="button" value="Zrób zdjęcie" onClick="take_snapshot()" />
                                    <input type="hidden" name="image" class="image-tag" />
                                    <input type="hidden" name="location" value="<?php echo $_POST['location']; ?>">

                                </div>
                                <div class="col-md-6">
                                    <div id="results"></div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <br />
                                    <button class="btn btn-primary" id="save_camera_img" disabled>Zapisz</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="../scripts/camera_script.js"></script>

</html>