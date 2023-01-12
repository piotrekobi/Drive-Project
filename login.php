<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "shared/head.php"; ?>
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="login_styles.css">
</head>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: index.php?location=Home");
} ?>

<body>
    <main class="form-signin">
        <form action="/../forms/login.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Zaloguj się</h1>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger" role="alert">' .
                    $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username">
                <label for="username">Nazwa użytkownika</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Zaloguj się">
            <a type="button" href="register.php" class="w-100 btn btn-lg btn-primary mt-1">Zarejestruj się</a>
            <a type="button" href="index.php" class="w-100 btn btn-lg btn-warning mt-3">Powrót</a>
        </form>
    </main>
</body>

</html>