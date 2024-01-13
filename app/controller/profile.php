<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/user.php";

        $user = null;

        setupPage();

        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        switch ($action) {
            case "update":
                updateAccount();
                break;
            case "delete":
                deleteAccount();
                break;
            case "disconnect":
                disconnect();
                break;
            default:
                break;
        }

        require_once "app/view/profile.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}

function setupPage()
{
    global $user;

    $user = getUserById($_SESSION["id_user"]);
}

function updateAccount()
{
    global $user;

    if (empty($_POST["name_user"])) {
        return;
    }

    if (empty($_POST["fname_user"])) {
        return;
    }

    if (empty($_POST["mail_user"])) {
        return;
    }

    if (!isset($_POST["password_user"]) || empty($_POST["password_user"])) {
        $password_user = $user["password_user"];
    } else {
        $password_user = $_POST["password_user"];
    }

    if (!isset($_POST["c_password_user"]) || empty($_POST["c_password_user"])) {
        $c_password_user = $user["password_user"];
    } else {
        $c_password_user = $_POST["c_password_user"];
    }

    $name_user = $_POST["name_user"];
    $fname_user = $_POST["fname_user"];
    $mail_user = $_POST["mail_user"];

    if ($password_user === $c_password_user && !getUserByEmail($mail_user)) {
        updateUser($_SESSION["id_user"], $fname_user, $name_user, $mail_user, hash("crc32", $password_user));
        header("Refresh:0");
        exit();
    }
}
function deleteAccount()
{
    removeUser($_SESSION["id_user"]);
    session_destroy();
    header("Location: auth/register");
    exit();
}
function disconnect()
{
    session_destroy();
    header("Location: auth/login");
    exit();
}

?>