<?php
if (!isset($_SESSION)) {
    session_start();
}
function get_actual_path($url_path)
{
    $user_root_folder = "files" . "/" . $_SESSION['rootFolder'];
    return substr_replace($url_path, $user_root_folder, 0, strlen("Home"));
}

function get_url_path($path)
{
    $user_root_folder = "files" . "/" . $_SESSION['rootFolder'];
    return substr_replace($path, "Home", 0, strlen($user_root_folder));
}
function print_navbar($url_path)
{
    $dir = get_actual_path($url_path);
    $dir_names = explode("/", $dir);
    $dir_names = array_slice($dir_names, 2);
    array_unshift($dir_names, "Home");
    $html_code = "";
    foreach ($dir_names as $index => $name) {
        $path = implode("/", array_slice($dir_names, 0, $index + 1));
        $html_code .= "<h5><a href=index.php?location=$path>$name</a></h5>";
        if ($index != count($dir_names) - 1)
            $html_code .= "<h5>&nbsp>&nbsp</h5>";
    }
    echo ($html_code);

}

function listFiles($url_path)
{
    $dir = get_actual_path($url_path);
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "";
    foreach ($files as $file) {
        $path = $dir . "/" . $file;
        $onclick_path = $path;
        $preview = "<img class='card-img-top' alt='' src='$path'>";
        $file_size = human_filesize(filesize($path));
        $date_modified = date("M j Y", filemtime($path));
        if (is_dir($path)) {
            $path = get_url_path($path);
            $onclick_path = "index.php?location=$path";
            $preview = "<div class=\"card-img-top text-center\"><i class=\"bi bi-folder\" style=\"font-size: 128px\"></i></div>";
            $file_size = "";
            $html_code .= "<div class='card file-card m-2' style='width: 18rem;' onclick=\"location.href='$onclick_path';\">
                            $preview    
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>$date_modified</small></p>
                                    <p class='card-text'><small class='text-muted'>$file_size</small></p>
                                </div>
                            </div>
                        </div>";
                        echo ($html_code);
                        $html_code = "";
                        
        } else {
            // $html_code .= "<div class='card file-card m-2' style='width: 18rem;' onclick=\"location.href='file_viewer.php/$onclick_path';\"> OLD
            $html_code .= "<div class='card file-card m-2' style='width: 18rem;' onclick=\"location.href='file_viewer2.php?file=$onclick_path';\">
                            $preview    
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>$date_modified</small></p>
                                    <p class='card-text'><small class='text-muted'>$file_size</small></p>
                                </div>
                            </div>
                        </div>";
                        echo ($html_code);
                        $html_code = "";
        }
    }
    if (!$files && substr_count($dir, '/') != 1){
        $html_code .= "<style>
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
            font-family: 'proxima-nova-soft', sans-serif;
            font-weight: 600;
            text-decoration: none;
            transition: box-shadow 200ms ease-out;
        }
        </style>
        <div>
                            <form method='post'>
                            <button class='deleteButton' type='submit' name='remButton' value='remButton'/>usuń folder</button>
                        </div>
                    </div>";
        echo ($html_code);
        $html_code = "";
        if(array_key_exists('remButton', $_POST)) {
            rmdir($_SERVER['DOCUMENT_ROOT'].'/'.$dir);
            ?>
            <script type="text/javascript">
            window.location = "/../index.php?location=Home";
            </script>
            <?php
        }
    }
}

function human_filesize($bytes, $decimals = 0)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    $human_size = sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    if ($factor != 0)
        $human_size .= "B";
    return $human_size;
}

function listDirs($url_path)
{
    $dir = get_actual_path($url_path);
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "";
    foreach ($files as $file) {
        $path = $dir . "/" . $file;
        if (is_dir($path)) {
            $path = get_url_path($path);
            $html_code .= "<li class=\"list-group-item\">
                <a href=\"index.php?location=$path\">$file</a>
            </li>";
        }
    }
    echo ($html_code);
}


function validateCredentials($username, $password)
{
    // Sprawdź długość loginu (od 3 do 16 znaków)
    if (strlen($username) < 1 || strlen($username) > 16) {
        return 'Niepoprawna długość loginu (od 1 do 16 znaków)';
    }

    // Sprawdź, czy login zawiera tylko dozwolone znaki (cyfry, litery i znaki "_" oraz "-")
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)) {
        return 'Login może zawierać tylko litery, cyfry, znaki "_" i "-"';
    }

    // Jeśli nie został zwrócony żaden komunikat o błędzie, to znaczy, że login i hasło są poprawne
    return true;
}
?>