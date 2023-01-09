<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-2">
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link" id="nav-upload-tab" data-bs-toggle="tab" data-bs-target="#nav-upload"
                            type="button" role="tab" aria-controls="nav-upload" aria-selected="true">
                            Prześlij plik
                        </button>
                        <button class="nav-link" id="nav-photo-tab" data-bs-toggle="tab" data-bs-target="#nav-photo"
                            type="button" role="tab" aria-controls="nav-photo" aria-selected="false">
                            Zrob zdjęcie
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="tab-content">
                        <div class="tab-pane fade active show" id="nav-upload" data-bs-toggle="tab"
                            data-bs-target="#nav-upload-tab" role="tabpanel" aria-labelledby="nav-upload-tab">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="mb-3 mt-2 align-items-end">
                                    <input class="btn btn-primary" type="submit" value="Zatwierdź">
                                </div>
                                <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-photo" data-bs-toggle="tab" data-bs-target="#nav-photo-tab"
                            role="tabpanel" aria-labelledby="nav-photo-tab">
                            <form action="views/saveFromCamera.php" method="post" enctype="multipart/form-data">
                                <button class="btn btn-primary" onclick="takeAPicture()">Zapisz zdjęcie z
                                    kamery</button>
                                <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Foldery
                    <form action="add_folder.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
                        <div class="mb-3 mt-2 align-items-end">
                            <div>
                                <input type='text' class='form-control' id='new_folder_name' name='new_folder_name'>
                                <label for='username'>nazwa nowego folderu</label>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Dodaj folder">
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <?php listDirs($_GET['location']) ?>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="card bg-light mb-3">
                <div class="card-header d-flex">
                    <?php print_navbar($_GET['location']) ?>
                </div>
                <div class="card-body p-0 d-flex flex-wrap">
                    <?php listFiles($_GET['location']) ?>
                </div>
            </div>
        </div>
    </div>
</div>