<?php
// session_start();
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
}
?>
<div class="d-flex justify-content-between p-3 my-0 text-white bg-dark rounded shadow-sm">

    <?php ?>
    <h2>
        <a href="index.php?location=Home"> SuperDrive</a>
    </h2>
    <div class="inline-block ">
        <form action="/../forms/logout.php" method="post">
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo '<div class="mx-2 d-inline-block">' . "Witaj, {$user_name}" .
                    '</div>
            <input type="submit" class="btn btn-secondary" value="Wyloguj się">';
            } else {
                echo '<a type="button" href="login.php"class="btn btn-primary">Zaloguj się</a>
                  <a type="button" href="register.php"class="btn btn-secondary">Zarejestruj się</a>';
            }
            ?>

        </form>
    </div>

</div>