<?php
include "funcs.php";
?>
<!DOCTYPE html>
<html>
<style>
.renameButton {
    border: 0;
    text-align: center;
    display: inline-block;
    padding: 14px;
    width: 150px;
    margin: 7px;
    color: #ffffff;
    background-color: #24DA1E;
    border-radius: 8px;
    font-family: "proxima-nova-soft", sans-serif;
    font-weight: 600;
    text-decoration: none;
    transition: box-shadow 200ms ease-out;
}
.deleteButton {
    border: 0;
    text-align: center;
    display: inline-block;
    padding: 14px;
    width: 150px;
    margin: 7px;
    color: #ffffff;
    background-color: #F00C0C;
    border-radius: 8px;
    font-family: "proxima-nova-soft", sans-serif;
    font-weight: 600;
    text-decoration: none;
    transition: box-shadow 200ms ease-out;
}
.retButton {
    border: 0;
    text-align: center;
    display: inline-block;
    padding: 14px;
    width: 320px;
    margin: 7px;
    color: #ffffff;
    background-color: #36a2eb;
    border-radius: 8px;
    font-family: "proxima-nova-soft", sans-serif;
    font-weight: 600;
    text-decoration: none;
    transition: box-shadow 200ms ease-out;
}
</style>

<center>
    <?php
    $file = "";
    $file .= $_SERVER['REQUEST_URI'];
    $file = substr($file, 17);
    $html_code = "";
    $path = $file;
    $onclick_path = $path;
    $preview = "<img class='card-img-top' alt='' src='$path'>";
    $file_size = human_filesize(filesize($path));
    $date_modified = date("M j Y", filemtime($path));
    if (is_dir($path)) {
        $path = get_url_path($path);
        $onclick_path = "index.php?location=$path";
        $preview = "<div class=\"card-img-top text-center\"><i class=\"bi bi-folder\" style=\"font-size: 128px\"></i></div>";
        $file_size = "";
    }
    $html_code .= "<div class='card file-card m-2' style='width: 18rem;'>
                            $preview    
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>$date_modified</small></p>
                                    <p class='card-text'><small class='text-muted'>$file_size</small></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class='form-floating'>
                                <input type='text' class='form-control' id='new_name' name='new_name'>
                                <label for='username'>Nowa nazwa</label>
                            </div>
                            <form method='post'>
                                <button class='renameButton' type='submit' value='renButton'/>zmień nazwę</button>
                                <button class='deleteButton' type='submit' value='delButton'/>usuń</button>
                            </form>
                            <div>
                                <button class='retButton' onclick=\"location.href='/../index.php?location=Home';\">Powrót</button>
                            </div>
                        </div>";
    echo ($html_code);
    $pieces = explode("/", $file);
    $sliced = array_slice($pieces, 0, -1);
    $string = implode("/", $sliced);
    ?>
</center>
<?php
    if(isset($_POST['renButton']) && !empty($_POST['new_name'])) {
        $new_name = $_POST['new_name'];
        rename($file, $string + '/' + $new_name);
    }
    if(isset($_POST['delButton'])) {
        rmdir('/../'.$file);
        header('Location: /../index.php?location=Home');
        exit();
    }
?>
</html>