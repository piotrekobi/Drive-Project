<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<div class="container-fluid mt-3">
    <h1 class="text-center">
        Zrób zdjęcie i zapisz obraz na dysku
    </h1>

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
                <button class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </form>
</div>

<script src="../scripts/camera_script.js"></script>