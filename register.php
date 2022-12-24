<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html>
<style>
</style>

<head>
    <?php include "shared/head.php"; ?>
    <title>Zaloguj się</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: index.php");
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
            <a type="button" href="index.php" class="w-100 btn btn-lg btn-warning mt-3">Powrót</a>        </form>
    </main>
</body>

</html>