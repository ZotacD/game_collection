<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/game.php";

        $games = null;

        setupPage();

        require_once "app/view/home.php";

        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}

function setupPage()
{
    global $games;

    $games = getUserGames($_SESSION["id_user"]);
}