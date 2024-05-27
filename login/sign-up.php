<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registreren</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }

        .main {
            max-width: 600px;
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
    </style>
</head>
<body>
<div class="main">
    <header class="m-3 p-3">
        <img src="../img/images.png" alt="Logo" class="logo">
        <h3>Vul dit in om een account aan te maken:</h3>
    </header>
    <div class="d-flex justify-content-center">
        <form action="login.php" method="post" class="w-75">
            <div class="form-group">
                <label for="voornaam">Voornaam:</label>
                <input type="text" id="voornaam" name="voornaam" class="form-control" placeholder="Voer hier je voornaam in:" required>
            </div>
            <div class="form-group">
                <label for="achternaam">Achternaam:</label>
                <input type="text" id="achternaam" name="achternaam" class="form-control" placeholder="Voer hier je achternaam in:" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Voer hier je email in:" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" id="wachtwoord" name="wachtwoord" class="form-control" placeholder="Voer hier je wachtwoord in:" required>
            </div>
            <input type="hidden" name="action" value="createuser">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybVuLJG0IGFjC2c
