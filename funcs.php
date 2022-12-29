<?php

function print_navbar($dir)
{
    $dir_names = explode("/", $dir);
    $html_code = "";
    foreach ($dir_names as $index => $name) {
        $path = implode("/", array_slice($dir_names, 0, $index + 1));
        $html_code .= "<h5><a href=index.php?location=$path>$name</a></h5>";
        if ($index != count($dir_names) - 1)
            $html_code .= "<h5>&nbsp>&nbsp</h5>";
    }
    echo ($html_code);

}

function listFiles($dir)
{
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
            $onclick_path = "index.php?location=$path";
            $preview = "<div class=\"card-img-top text-center\"><i class=\"bi bi-folder\" style=\"font-size: 128px\"></i></div>";
            $file_size = "";
        }
        $html_code .= " <div class='card file-card m-2' style='width: 18rem;' onclick=\"location.href='$onclick_path';\">
                            $preview    
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>$date_modified</small></p>
                                    <p class='card-text'><small class='text-muted'>$file_size</small></p>
                                </div>
                            </div>
                        </div>";
    }
    echo ($html_code);
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

function listDirs($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "";
    foreach ($files as $file) {
        $path = $dir . "/" . $file;
        if (is_dir($path)) {
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
    if (strlen($username) < 3 || strlen($username) > 16) {
        return 'Niepoprawna długość loginu (od 3 do 16 znaków)';
    }

    // Sprawdź długość hasła (minimum 8 znaków)
    if (strlen($password) < 8) {
        return 'Hasło musi składać się z co najmniej 8 znaków';
    }

    // Sprawdź, czy login zawiera tylko dozwolone znaki (cyfry, litery i znaki "_" oraz "-")
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)) {
        return 'Login może zawierać tylko litery, cyfry, znaki "_" i "-"';
    }

    // Sprawdź, czy hasło zawiera przynajmniej jedną cyfrę i jedną dużą literę
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
        return 'Hasło musi zawierać przynajmniej jedną cyfrę i jedną dużą literę';
    }

    // Jeśli nie został zwrócony żaden komunikat o błędzie, to znaczy, że login i hasło są poprawne
    return true;
}
?>