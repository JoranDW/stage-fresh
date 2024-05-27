<?php
require_once('config/db-conn.php');
$db = new acties();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->delete($id);
    header("Location: index.php");
    exit();
} else {
    echo "Error: Geen id mee gekregen.";
}
?>