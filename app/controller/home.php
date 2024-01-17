<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/game.php";
        if(isset($_SESSION["id_user"])){
            $games = info_game_with_id($_SESSION["id_user"]);
        } else {
            $games = null;
        }
        require_once "app/view/home.php";
        
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}