<?php
$t = "";
$json = file_get_contents('../users.json');
$users = json_decode($json, true);
// error_log(print_r($users, TRUE)); 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]['password'] == $password) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: /../index.php');
        exit;
    } else {
        $error_login_message = "Błędna nazwa użytkownika lub hasło";
        header('Location: /../login.php');
    }
} else {

    $error_login_message = "Podaj nazwę użytkownika oraz hasło";
    header('Location: /../login.php');
}

?>

<!DOCTYPE html>
<html>
<style>
    .dd {
        background-color: red;
    }
</style>

<head>
    <?php include "shared/head.php"; ?>
    <title>Drive</title>
</head>

<body>
    <div class="container-fluid px-1 vh-100">
        <?php echo "dddd";
        echo $json;
        print_r($users) ?>
    </div>
</body>

</html>

