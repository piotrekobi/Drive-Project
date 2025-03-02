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
    <link rel="stylesheet" href="styles/register_styles.css">
</head>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: index.php?location=Home");
} ?>

<body>
    <main class="form-signin">
        <form action="/../forms/register.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Zarejestruj się</h1>
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
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Zarejestruj się</button>
            <a type="button" href="index.php" class="w-100 btn btn-lg btn-warning mt-3">Powrót</a>
        </form>
    </main>
</body>

</html>