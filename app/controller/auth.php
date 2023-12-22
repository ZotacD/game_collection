<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

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
    $password_user = $_POST["password_user"];

    $user = getUser($mail_user, $password_user);

    if (!empty($user)) {
        $_SESSION["id_user"] = $user["id_user"];
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    }
}

function setup_register_inputs()
{
    if (!isset($_POST["mail_user"])) {
        return;
    }

    if (!isset($_POST["password_user"])) {
        return;
    }


    $mail_user = $_POST["mail_user"];
    $password_user = $_POST["password_user"];

    $user = getUser($mail_user, $password_user);

    if (!empty($user)) {
        $_SESSION["id_user"] = $user["id_user"];
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    }
}