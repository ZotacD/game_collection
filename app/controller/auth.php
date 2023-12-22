<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case 'login':
        require_once "app/model/user.php";
        require_once "app/view/login.php";
        break;
    case 'register':
        require_once "app/model/user.php";
        require_once "app/view/regsiter.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}