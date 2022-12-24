<?php
function listFiles($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "";
    foreach ($files as $file) {
        $html_code .= " <div class='card file-card m-2' style='width: 18rem;'>
                            <img class='card-img-top' alt='' src='$dir/$file'>
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>Jan 1, 2021</small></p>
                                    <p class='card-text'><small class='text-muted'>3.5 MB </small></p>
                                </div>
                            </div>
                        </div>";
    }
    echo($html_code);
}
function validateCredentials($username, $password) {
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
