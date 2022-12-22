<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    error_log(print_r("true", TRUE));
    $users = json_decode(file_get_contents('../users.json'), true);
    if (isset($users[$username])) {
        // uzytkownik juz istenieje
        error_log(print_r("uzytkownik juz istenieje", TRUE));
        header('Location: /../register.php');
    }
    else{
        error_log(print_r("dodaje", TRUE));
        $users[$username] = array('password' => $password);
        file_put_contents('../users.json', json_encode($users));
        header('Location: /../login.php');
    }
}
else {
    error_log(print_r("inny blad", TRUE));
    header('Location: /../register.php');
}
