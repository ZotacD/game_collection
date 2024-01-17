<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION["id_user"])){
            header("Location: ".$_ENV["BASE_DIR"]."login");
            exit();
        }
        require_once "app/model/game.php";
        $games = empty($_GET["search_game"]) ? without_game($_SESSION['id_user']) : info_game_with_name($_GET["search_game"]);
        if (isset($_POST["add_game_library"])) {
            add_to_library($_SESSION["id_user"],$_POST["id_game"]);
            header("Location: ".$_ENV["BASE_DIR"]);
            exit();
        }

        require_once "app/view/library.php";
        break;
    case 'add':
        require_once "app/model/game.php";

        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        switch ($action) {
            case "add":
                addGameInputs();
                break;
            default:
                break;
        }

        require_once "app/view/add_game.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "403");
        exit();
}

function addGameInputs(){

    if(!isset($_POST["name_game"]) && !empty($_POST["name_game"])){
        return;
    }
    if(!isset($_POST["editor_game"])&& !empty($_POST["editor_game"])){
        return;
    }
    if(!isset($_POST["release_date"])&& !empty($_POST["release_date"])){
        return;
    }
    if(!isset($_POST["description_game"])&& !empty($_POST["description_game"])){
        return;
    }
    if(!isset($_POST["url_cover"])&& !empty($_POST["url_cover"])&& filter_var($_POST["url_cover"], FILTER_VALIDATE_URL)){
        return;
    }
    if(!isset($_POST["url_website"])&& !empty($_POST["url_website"]) && filter_var($_POST["url_website"], FILTER_VALIDATE_URL)){
        return;
    }

    if(!isset($_POST["playstation"])&& !isset($_POST["xbox"])&&!isset($_POST["nintendo"])&& !isset($_POST["pc"])){
        return;
    }



    $name_game = $_POST["name_game"];
    $editor_game = $_POST["editor_game"];
    $release_date = $_POST["release_date"];
    $description_game = $_POST["description_game"];
    $url_cover = $_POST["url_cover"];
    $url_website = $_POST["url_website"];

    $isPlaystation = false;
    $isXbox = false;
    $isNintendo = false;
    $isPc = false;

    if(isset($_POST["playstation"])){
        $isPlaystation=true;
    }
    if(isset($_POST["xbox"])){
        $isXbox=true;
    }
    if(isset($_POST["nintendo"])){
        $isNintendo=true;
    }
    if(isset($_POST["pc"])){
        $isPc=true;
    }
    $platfom_game = "";
    if($isPlaystation){
        $platfom_game .= "Playstation, ";
    }
    if($isXbox){
        $platfom_game .= "Xbox, ";
    }
    if($isNintendo){
        $platfom_game .= "Nintendo, ";
    }
    if($isPc){
        $platfom_game .= "PC, ";
    }

    $platforms = rtrim($platfom_game, ', ');

    addGame($name_game, $editor_game, $release_date, $description_game, $platforms, $url_cover, $url_website);
}