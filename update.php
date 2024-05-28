<?php

require_once 'config/acties.php';
require_once('config/db-conn.php');

$db = new acties();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db->update();
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$row = $db->retrieve($id);



?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Medewerker bijwerken</title>
</head>

<style>

    .logo {
        width: 200px;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;

    }

    form {
        width: 50%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.15);
    }

</style>

<body>

<div class="container">
    <a href="index.php"> <img src="img/images.png" alt="Logo" class="logo"> </a>
</div>

<div id="container" class="form-container">
    <form action="update.php" method="post">
        <fieldset>

            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">


            <div class="mb3">
                <label for="titel_id" class="form-label">Titel':</label>
                <input type="text" id="titel_id" name="titel" maxlength="20" required="required"
                       class="form-control" value="<?php echo $row['titel'] ?>">
            </div>
            <div class="mb-3">
                <label for="beschrijving_id" class="form-label">Beschrijving:</label>
                <input type="text" id="beschrijving_id" name="beschrijving" maxlength="100" required="required"
                       class="form-control" value="<?php echo $row['beschrijving'] ?>">
            </div>
            <div class="mb-3">
                <label for="status_id" class="form-label">Status:</label>
                <input type="text" id="status_id" name="status" maxlength="10" required="required"
                       class="form-control" value="<?php echo $row['status'] ?>">
            </div>
            <div class="mb-3">
                <label for="prioriteit_id" class="form-label">Prioriteit:</label>
                <input type="text" id="prioriteit_id" name="prioriteit" maxlength="10" required="required"
                       class="form-control" value="<?php echo $row['prioriteit'] ?>">
            </div>
            <div class="mb-3">
                <label for="deadline_id" class="form-label">deadline:</label>
                <input type="date" id="deadline_id" name="deadline" required="required"
                       class="form-control" value="<?php echo date('Y-m-d', strtotime($row['deadline'])) ?>">
            </div>

            <input type="submit" name="send" value="send" class="btn btn-primary mt-3" onclick='return confirm("Heeft u alles goed ingevuld?")'>
        </fieldset>


    </form>
</div>

</body>
</html>