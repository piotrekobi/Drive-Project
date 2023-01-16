<?php
include "funcs.php";
?>
<!DOCTYPE html>
<html>
<style>
a:link{
  color:white;
}
a:visited{
  color:white;
}
a:hover{
  color:white;
}
a:focus{
  color:white;
}
a:active{
  color:white;
}
</style>
<head>
    <link rel="stylesheet" href="button_styles.css">
    <?php include "shared/head.php"; ?>
    <title>Podgląd</title>
</head>
<?php include "shared/protect_files.php"; ?>
<body>
    <center>
        <div class="container-fluid px-1 vh-100">
            <?php include "shared/header_bar.php"; ?>
            <main class="h-75 align-content-center pt-3">
                <!-- Page content -->
                Podgląd pliku
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <?php 
                        print($_GET['file']);
                        $TTT = $_GET['file'];
                        $LOL = "<img class='card-img-top' alt='' src='$TTT'>";
                        print($LOL);
                        $pieces = explode("/", $_GET['file']);
                        $sliced = array_slice($pieces, 0, -1);
                        $temp = end($pieces);
                        $string = implode("/", $sliced);?>
                    </div>
                </div>
                <br>
                <div>
                    <form method='post'>
                        <div>
                            <div class="card" style="width: 18rem;">
                                <input type='text' class='form-control' id='new_name' name='new_name'>
                                <label for='username'>Nowa nazwa</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="renameButton" name='renButton' value='renButton'>zmień nazwę</button>
                            <button type="submit" class="deleteButton" name='delButton' value='delButton'>usuń</button>
                        </div>
                    </form>
                    <div>
                        <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$_GET['file']; ?>" class="downloadButton" download="<?php echo end($pieces); ?>">Pobierz</a>
                        <button type="submit" class="retButton" onclick="location.href='/../index.php?location=Home';">Powrót</button>
                    </div>
                </div>

                <?php if(array_key_exists('renButton', $_POST) && !empty($_POST['new_name'])) {
                    $new_name = $_POST['new_name'];
                    if (!file_exists($string . '/' . $new_name)) {
                        rename($_GET['file'], $string . '/' . $new_name);
                    }
                    ?>
                    <script type="text/javascript">
                    window.location = "/../index.php?location=Home";
                    </script>
                    <?php
                }
                else if(array_key_exists('delButton', $_POST)) {
                    unlink($_SERVER['DOCUMENT_ROOT'].'/'.$_GET['file']);
                    ?>
                    <script type="text/javascript">
                    window.location = "/../index.php?location=Home";
                    </script>
                    <?php
                }
                ?>
            </main>
        </div>
    </center>
</body>

</html>