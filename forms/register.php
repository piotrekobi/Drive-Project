<?php
include "../funcs.php";
?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = validateCredentials($username, $password);
    if ($result !== true) {
        $_SESSION['error'] = $result;
        header('Location: /../register.php');
        return;
    } 
      
    $users = json_decode(file_get_contents('../users.json'), true);
    if (isset($users[$username])) {
        $_SESSION['error'] = "Użytkownik o danym nicku już istnieje";
        header('Location: /../register.php');
    }
    else{
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // $users[$username] = array('password' => $passwordHash);
        
        // stworz dla uzytkownika unikalny folder na jego pliki
        $filesFolder = "../files/";
        
        $userRootFolder = substr(base_convert(mt_rand(), 10, 36), 0, 8);
        $folderPath = $filesFolder . $userRootFolder;
        
        while(is_dir($folderPath)){
            $userRootFolder = substr(base_convert(mt_rand(), 10, 36), 0, 8);
            $folderPath = $filesFolder . $userRootFolder;
        }
        mkdir($folderPath);
        $users[$username] = array('password' => $passwordHash, 'rootFolder' => $userRootFolder);
        file_put_contents('../users.json', json_encode($users));
        header('Location: /../login.php');
    }
}
else {
    if(empty($_POST['username'])){
        $_SESSION['error'] = "Podaj nazwę użytkownika";
    }
    else{
        $_SESSION['error'] = "Podaj hasło";
    }
    header('Location: /../register.php');
}
