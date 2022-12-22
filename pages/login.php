<?php
session_start();
session_destroy();
// sprawdzanie, czy formularz został wysłany
if (isset($_POST['login'])) {
    // pobieranie danych z formularza
    $username = $_POST['username'];
    $password = $_POST['password'];

    // sprawdzanie poprawności danych logowania
    // (tu należy zastosować odpowiednią logikę)
    if ($username == 'test' && $password == 'test') {
        // tworzenie sesji dla zalogowanego użytkownika
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // przekierowywanie na stronę główną
        header('Location: ../index.php');
        exit;
    } else {
        // ustawianie komunikatu o błędnym haśle
        $error_message = 'Niepoprawne dane logowania';
    }
}

// sprawdzanie, czy użytkownik jest już zalogowany
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // użytkownik jest już zalogowany, więc przekierowywanie na stronę główną
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Logowanie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <?php if (isset($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <div class="align-content-center justify-content-center">
        <main class="form-signin text-center">
            <form class="{% block form_class %}form-auth{% endblock %}" method="post">
                <p class="h4 text-muted">{% block msg %}{% endblock %}</p>
                <hr>
                
                <hr>
                <div class="row justify-content-center" style="margin-bottom: 2%;">
                    <div class="col col-auto">
                        <div class="btn-group">
                            {% block left-href %}{% endblock %}
                            <button type="submit" class="btn btn-success">
                                {% block button %} {% endblock %}
                            </button>
                            {% block right-href %}{% endblock %}
                        </div>
                    </div>
                </div>
                <hr>
            </form>
        </main>
    </div>
    <!-- <form method="post" action="login.php">
            <label for="username">Nazwa użytkownika:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password"> Hasło:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Zaloguj się" name="login">
        </form> -->
</body>

</html>