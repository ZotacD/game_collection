<?php

require_once 'db_config.php';

function getGamesWithName($name_game, $id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME WHERE name_game LIKE :name_game AND id_game NOT IN (SELECT id_game FROM LIBRARY WHERE id_user=:id_user)");
    $bddQuery->execute([
        "name_game" => '%' . $name_game . '%',
        "id_user" => $id_user
    ]); // Passez le terme de recherche avec les jokers inclus
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getUserGames($id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME INNER JOIN LIBRARY ON LIBRARY.id_game=GAME.id_game INNER JOIN PERSON ON PERSON.id_user=LIBRARY.id_user WHERE PERSON.id_user = :id_user");
    $bddQuery->execute(['id_user' => $id_user]);
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}

function addGame($name_game, $editor_game, $release_date, $description_game, $platform_game, $url_cover, $url_website)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("INSERT INTO GAME(name_game, editor_game, release_date, description_game, platform_game, url_cover, url_website) 
    VALUES (:name_game, :editor_game, :release_date, :description_game, :platform_game, :url_cover, :url_website)");
    $bddQuery->execute([
        "name_game" => htmlspecialchars($name_game),
        "editor_game" => htmlspecialchars($editor_game),
        "release_date" => htmlspecialchars($release_date),
        "description_game" => htmlspecialchars($description_game),
        "platform_game" => htmlspecialchars($platform_game),
        "url_cover" => htmlspecialchars($url_cover),
        "url_website" => htmlspecialchars($url_website)
    ]);
}

function isGameInLibrary($id_game, $id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM LIBRARY WHERE id_game=:id_game AND id_user=:id_user");
    $bddQuery->execute([
        "id_game" => htmlspecialchars($id_game),
        "id_user" => htmlspecialchars($id_user)
    ]);

    $result = $bddQuery->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function addGameToLibrary($id_game, $id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("INSERT INTO LIBRARY(id_game, id_user) VALUES (:id_game, :id_user)");
    $bddQuery->execute([
        "id_game" => htmlspecialchars($id_game),
        "id_user" => htmlspecialchars($id_user)
    ]);
}

?>