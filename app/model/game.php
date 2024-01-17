<?php

require_once 'db_config.php';

function info_game()
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME");
    $bddQuery->execute();
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
    
}
function info_game_with_id($id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME INNER JOIN LIBRARY ON LIBRARY.id_game=GAME.id_game INNER JOIN PERSON ON PERSON.id_user=LIBRARY.id_user WHERE PERSON.id_user = :id_user");
    $bddQuery->execute(['id_user' => $id_user]);
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}

function info_game_with_name($name) {
    $bdd = dbConnect();
    $searchTerm = '%' . $name . '%'; // Ajoutez les jokers ici
    $bddQuery = $bdd->prepare("SELECT * FROM GAME WHERE name_game LIKE ? AND id_game NOT IN (SELECT id_game FROM LIBRARY WHERE id_user = :id_user");
    $bddQuery->execute([$searchTerm,'id_user' => $id_user]); // Passez le terme de recherche avec les jokers inclus
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}
function without_game($id_user) {
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME WHERE id_game NOT IN (SELECT id_game FROM LIBRARY WHERE id_user = :id_user)");
    $bddQuery->execute(['id_user' => $id_user]);
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}
function addGame($name_game, $editor_game, $release_date, $description_game, $platform_game, $url_cover, $url_website) {
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

function add_to_library($id_user, $id_game) {
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("INSERT INTO LIBRARY(id_user, id_game, hours_played) VALUES (:id_user, :id_game, 0)");
    $bddQuery->execute([
        "id_game" => htmlspecialchars($id_game),
        "id_user" => htmlspecialchars($id_user)
    ]);
}


?>