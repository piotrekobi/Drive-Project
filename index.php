<?php include 'funcs.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </script>

</head>

<body>
    <div class="container-fluid px-1 vh-100">
        <div class="d-flex justify-content-between p-3 my-0 text-white bg-dark rounded shadow-sm">
            <h2> SuperDrive </h2>
            <div class="inline-block ">
                <!-- <button type="button" class="btn btn-primary">Zaloguj się</button>
                <button type="button" class="btn btn-secondary">Zarejestruj się</button> -->
                <div class="mx-2 d-inline-block">
                    Witaj, Gerard11
                </div>
                <button type="button" class="btn btn-secondary">Wyloguj się</button>
            </div>

        </div>
        <main class="h-75 align-content-center pt-3">
            <!-- Ekran startowy -->
            <!-- <div class="text-center">
                <h1 class="display-4">Witamy w zdalnym dysku</h1>
                <p> Prześlij swoje pliki i zapomnij, że je kiedykolwiek miałeś. </p>
            </div> -->
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-2">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link" id="nav-upload-tab" data-bs-toggle="tab" data-bs-target="#nav-upload" type="button" role="tab" aria-controls="nav-upload" aria-selected="true">
                                        Prześlij plik
                                    </button>
                                    <button class="nav-link" id="nav-photo-tab" data-bs-toggle="tab" data-bs-target="#nav-photo" type="button" role="tab" aria-controls="nav-photo" aria-selected="false">
                                        Zrob zdjęcie
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="tab-content">
                                    <div class="tab-pane fade active show" id="nav-upload" data-bs-toggle="tab" data-bs-target="#nav-upload-tab" role="tabpanel" aria-labelledby="nav-upload-tab">
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                            </div>
                                            <div class="mb-3 mt-2 align-items-end">
                                                <input class="btn btn-primary" type="submit" value="Zatwierdź">
                                            </div>
                                            <!-- <input type="submit" value="Zatwierdź" name="submit"> -->
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="nav-photo" data-bs-toggle="tab" data-bs-target="#nav-photo-tab" role="tabpanel" aria-labelledby="nav-photo-tab">
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <button class="btn btn-primary" onclick="takeAPicture()">Zapisz zdjęcie z kamery</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light mb-3">
                            <div class="card-header">Foldery</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#">Wszystko</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Zdjęcia</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Nagrania wideo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="card bg-light mb-3">
                            <div class="card-header d-flex justify-content-between">
                                <h5>Wszystkie pliki</h5>
                            </div>
                            <div class="card-body p-0 d-flex flex-wrap">
                                <?php listFiles("files") ?>
                                <div class="card file-card m-2" style="width: 18rem;">
                                    <div class="card-img-top text-center">
                                        <i class="bi bi-folder" style="font-size: 128px"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="stretched-link">Folder 1</a></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text mb-0"><small class="text-muted">Jan 1, 2021</small></p>
                                            <p class="card-text"><small class="text-muted">3.5 MB </small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card file-card m-2" style="width: 18rem;">
                                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="stretched-link">Zdjecie 1</a></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text mb-0"><small class="text-muted">Jan 1, 2021</small></p>
                                            <p class="card-text"><small class="text-muted">3.5 MB </small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card file-card m-2" style="width: 18rem;">
                                    <div class="card-img-top text-center">
                                        <i class="bi bi-file-earmark-music" style="font-size: 128px"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="stretched-link">Music 1</a></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text mb-0"><small class="text-muted">Jan 1, 2021</small></p>
                                            <p class="card-text"><small class="text-muted">3.5 MB </small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card file-card m-2" style="width: 18rem;">
                                    <div class="card-img-top text-center">
                                        <i class="bi bi-film" style="font-size: 128px"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="stretched-link">Video 1</a></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text mb-0"><small class="text-muted">Jan 1, 2021</small></p>
                                            <p class="card-text"><small class="text-muted">3.5 MB </small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</body>

</html>