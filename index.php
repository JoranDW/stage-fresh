<?php

require_once('config/db-conn.php');


$db = new acties();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login/sign-in.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db->create();
    header("Location: index.php");
    exit();
}


?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Freshportal medewerkers</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>

    .logo {
        width: 200px; /* Adjust as needed */
        height: auto; /* Maintain aspect ratio */
        display: block; /* Center the logo */
        margin-left: auto;
        margin-right: auto;
        padding: 20px 0; /* Add some space above and below the logo */
    }
</style>


<body>

<div class="container">
    <img src="img/images.png" alt="Logo" class="logo">
</div>


<div class="container d-flex flex-column align-items-end">
    <div class="container d-flex justify-content-end">
        <a href="create.php" class="btn btn-success mx-3 mb-3">Taak toevoegen</a>
        <form method="post" action="login/login.php" class="">
            <button type="submit" name="logout" class="btn btn-danger mb-3">Uitloggen</button>
        </form>
    </div>



    <table class="table table-striped overflow-hidden rounded-3">
        <tr class="table-dark">
            <th>ID</th>
            <th>Titel</th>
            <th>Beschrijving</th>
            <th>Status</th>
            <th>Prioriteit</th>
            <th>Deadline</th>
            <th>Acties</th>
        </tr>

        <?php

        $result = $db->read();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['titel'] . "</td>";
            echo "<td>" . $row['beschrijving'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['prioriteit'] . "</td>";
            echo "<td>" . $row['deadline'] . "</td>";

            echo "<td><a class='btn btn-warning' href='update.php?id=" . $row['id'] . "' onclick='return confirm(\"Weet je zeker dat je " . $row['titel'] . " wilt aanpassen\")'><i class='bi bi-pencil'></i></a> | <a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Weet je zeker dat je " . $row['titel'] . " wilt verwijderen\")' ><i class='bi bi-trash'></i> </a></td>";
            echo "</tr>";
        }
        ?>

        <tr></tr>
    </table>
</div>


</body>
</html>

