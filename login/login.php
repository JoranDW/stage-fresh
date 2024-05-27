<?php


require_once '../config/db-conn.php';

$db = new DBConnectionUser();

class login
{


    private $db;

    public function __construct()
    {
        $this->db = new DBConnectionUser();
    }


    public function login($email, $wachtwoord)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            if (password_verify($wachtwoord, $result['wachtwoord'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['loggedin'] = true;

                echo "login succesvol";
                header('Location: ../index.php');


            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['fail'] = 'De combinatie van het e-mailadres en het wachtwoord is niet bij ons bekend. Probeer het opnieuw.';
                header('Location: sign-in.php');
                exit;
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['fail'] = 'De combinatie van het e-mailadres en het wachtwoord is niet bij ons bekend. Probeer het opnieuw.';
            header('Location: sign-in.php');
            exit;

        }
    }


    public function createUser()
    {
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];


        // Hash het wachtwoord
        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['fail'] = 'Het e-mailadres is al in gebruik. Probeer het opnieuw met een ander e-mailadres.';
            header('Location: sign-in.php');
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO users (voornaam, achternaam, email, wachtwoord) VALUES (:voornaam, :achternaam, :email, :wachtwoord)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $hashedWachtwoord);
        $stmt->bindParam(':voornaam', $voornaam);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->execute();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Store a success message in the session
        $_SESSION['message'] = 'Account aangemaakt! Je kunt nu inloggen.';

        // Redirect to signin.php
        header('Location: sign-in.php');
        exit;


    }

    public function logout()
    {
        // Start the session if it's not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset the session variable indicating the user is logged in
        unset($_SESSION['loggedin']);

        // Redirect to the login page
        header('Location: sign-in.php');
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new login();

    $emailingevoerd = $_POST['email'];
    $wachtwoordingevoerd = $_POST['wachtwoord'];

    if ($_POST['action'] == 'loginuser') {
        $login->login($emailingevoerd, $wachtwoordingevoerd);
    } elseif ($_POST['action'] == 'createuser') {
        $login->createUser();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new login();

    if (isset($_POST['logout'])) {
        $login->logout();
    }
}