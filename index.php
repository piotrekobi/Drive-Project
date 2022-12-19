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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Prześlij plik:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Zatwierdź" name="submit">
    </form>

    Pliki na dysku:
    <?php listFiles("files") ?>
</body>

</html>