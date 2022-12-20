<?php include 'funcs.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Drive</title>

    <link rel="stylesheet" href="style.css">
    <script src="script.js">
    </script>

</head>

<body>
    <div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Prześlij plik:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Zatwierdź" name="submit">
    </form>
    <button class='takeAPictureButton' onclick="takeAPicture()">Zapisz zdjęcie z kamery</button>
    </div>

    Pliki na dysku:
    <?php listFiles("files") ?>
</body>

</html>