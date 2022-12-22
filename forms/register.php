<?php
include "../funcs.php";
?>
<?php
session_start();
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
        $users[$username] = array('password' => $password);
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
