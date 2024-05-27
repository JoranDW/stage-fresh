<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If so, redirect to the index page
    header('Location: ../index.php');
    exit;
}


?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inloggen</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }

        .main {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main header {
            text-align: center;
            margin-bottom: 20px;
        }

        .main header .logo {
            width: 150px; /* Pas deze waarde aan om het logo groter of kleiner te maken */
            margin-bottom: 10px;
        }

        .main header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .main header h3 {
            font-size: 16px;
            color: #6c757d;
        }

        .main form .form-group {
            margin-bottom: 15px;
        }

        .main form .form-control {
            border-radius: 5px;
        }

        .main form button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .main p {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>swal('Gelukt!', '{$message}', 'success');</script>";
    unset($_SESSION['message']);
} elseif (isset($_SESSION['fail'])) {
    $fail = $_SESSION['fail'];
    echo "<script>swal('Mislukt!', '{$fail}', 'error');</script>";
    unset($_SESSION['fail']);
}
?>

<div class="main">
    <header class="m-3 p-3">
        <img src="../img/images.png" alt="Logo" class="logo">
        <h3>Vul dit in om een account aan te maken:</h3>
    </header>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Voer hier je email in:" required>
        </div>
        <div class="form-group">
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" placeholder="Voer hier je wachtwoord in:" required>
        </div>
        <input type="hidden" name="action" value="loginuser">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
    <p>Nog geen account? <a href="sign-up.php">Maak een account aan!</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybVuLJG0IGFjC2c4IlK3VG/JVlggmgYnwyMvfZBy1M8Lq0ZE8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ku5iVmMFe4naw9g7bTo1m5KvAQZ1B8nS7XQ2bA3LJwzZjWKC3VWCCbb7PL6CRp6J" crossorigin="anonymous"></script>
</body>
</html>
