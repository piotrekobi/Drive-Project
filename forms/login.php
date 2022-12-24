<?php
include "../funcs.php";
?>

<?php

// session_start();
$json = file_get_contents('../users.json');
$users = json_decode($json, true);

if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($users[$username]) && $users[$username]['password'] == $password) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: /../index.php');
        exit;
    } 
    else {
        $_SESSION['error'] = "Błędna nazwa użytkownika lub hasło";
        header('Location: /../login.php');
    }

}

else {
    $_SESSION['error'] = "Podaj nazwę użytkownika oraz hasło";
    header('Location: /../login.php');
}

?>


