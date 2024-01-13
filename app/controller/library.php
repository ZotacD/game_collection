<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/game.php";

        if (isset($_POST["search_game"])) {
            $searchGame = urlencode($_POST["search_game"]);
            header("Location: add_game.php?name_game=" . $searchGame);
            exit();
        }

        require_once "app/view/library.php";
        break;
    case 'add':
        require_once "app/model/game.php";

        require_once "app/view/add_game.php";
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}