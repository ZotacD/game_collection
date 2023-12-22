<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

if ($_SESSION["id_user"] !== $_ENV["UNKNOWN_USER_ID"]) {
    header("Location: " . $_ENV["BASE_DIR"] . "profile");
    exit();
}

switch ($requestUrl) {
    case 'login':
        require_once "app/model/user.php";
        setup_login_inputs();
        require_once "app/view/login.php";
        break;
    case 'register':
        require_once "app/model/user.php";
        setup_register_inputs();
        require_once "app/view/register.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}

function setup_login_inputs()
{
    if (!isset($_POST["mail_user"])) {
        return;
    }

    if (!isset($_POST["password_user"])) {
        return;
    }

    $mail_user = $_POST["mail_user"];
    $password_user = hash("crc32", $_POST["password_user"]);

    $user = getUser($mail_user, $password_user);

    if ($user) {
        $_SESSION["id_user"] = $user["id_user"];
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    } else {
        echo "<script>alert('Utilisateur inconnu')</script>";
    }
}

function setup_register_inputs()
{
    if (!isset($_POST["fname_user"]) || empty($_POST["fname_user"])) {
        return;
    }

    if (!isset($_POST["name_user"]) || empty($_POST["name_user"])) {
        return;
    }

    if (!isset($_POST["mail_user"]) || empty($_POST["mail_user"])) {
        return;
    }

    if (!isset($_POST["password_user"]) || empty($_POST["password_user"])) {
        return;
    }

    if (!isset($_POST["c_password_user"]) || empty($_POST["c_password_user"])) {
        return;
    }

    if ($_POST["c_password_user"] !== $_POST["password_user"]) {
        echo "<script>alert('Veuillez indiquer un mot de passe identique')</script>";
        return;
    }

    $fname_user = $_POST["fname_user"];
    $name_user = $_POST["name_user"];
    $mail_user = $_POST["mail_user"];
    $password_user = hash("crc32", $_POST["password_user"]);

    addUser($fname_user, $name_user, $mail_user, $password_user);
    $user = getUser($mail_user, $password_user);

    if ($user) {
        $_SESSION["id_user"] = $user["id_user"];
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    } else {
        echo "<script>alert('Utilisateur inconnu')</script>";
    }
}