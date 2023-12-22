<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/login':
        require_once "model/user.php";
        require_once "view/login.php";
        break;
    case '/register':
        require_once "model/user.php";
        require_once "view/regsiter.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}