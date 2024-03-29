<?php

require_once(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
if (!isset($_SESSION["id_user"])) {
    $_SESSION["id_user"] = $_ENV["UNKNOWN_USER_ID"];
}

// Récupérer l'URL depuis le paramètre "url"

$requestUrl = isset($_GET['url']) ? $_GET['url'] : '/';

switch ($requestUrl) {
    case '/':
        require_once 'app/controller/home.php';
        break;
    case 'game':
        require_once 'app/controller/game.php';
        break;
    case 'library':
        if ($_SESSION["id_user"] != $_ENV["UNKNOWN_USER_ID"]) {
            require_once 'app/controller/library.php';
        } else {
            header("Location: auth/login");
            exit();
        }

        break;
    case 'auth':
        require_once 'app/controller/auth.php';
        break;
    case 'profile':
        if ($_SESSION["id_user"] != $_ENV["UNKNOWN_USER_ID"]) {
            require_once 'app/controller/profile.php';
        } else {
            header("Location: auth/login");
            exit();
        }

        break;
    case 'ranking':
        require_once 'app/controller/ranking.php';
        break;
    case '403':
        var_dump("403");
        break;
    case '404':
        var_dump("404");
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}