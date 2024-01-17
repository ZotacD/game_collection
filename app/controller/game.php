<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/game.php";

        $game = null;

        setupPage();

        $action = isset($_POST["action"]) ? $_POST["action"] : "";

        switch ($action) {
            case "update":
                updateUserGameInputs();
                break;
            case "delete":
                removeUserGameInputs();
                break;
            default:
                break;
        }

        require_once "app/view/game.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}

function setupPage()
{
    global $game;

    if (!isset($_GET["id_game"])) {
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    }

    $id_game = $_GET["id_game"];
    $id_user = $_SESSION["id_user"];

    $game = getUserGame($id_user, $id_game);

    if (!$game) {
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    }
}

function updateUserGameInputs()
{
    if (!isset($_POST["hours_played"]) || empty($_POST["hours_played"])) {
        header("Location: " . $_ENV["BASE_DIR"]);
        exit();
    }

    $hours_played = $_POST["hours_played"];
    $id_game = $_GET["id_game"];
    $id_user = $_SESSION["id_user"];

    updateUserGame($id_game, $id_user, $hours_played);

    header("Refresh:0");
    exit();
}
function removeUserGameInputs()
{
    $id_game = $_GET["id_game"];
    $id_user = $_SESSION["id_user"];

    removeUserGame($id_game, $id_user);

    header("Refresh:0");
    exit();
}

?>