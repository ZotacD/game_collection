<?php

require_once 'db_config.php';

function info_game()
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME");
    $bddQuery->execute();
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
    
}
function info_game_with_name($name) {
    $bdd = dbConnect();
    $searchTerm = '%' . $name . '%'; // Ajoutez les jokers ici
    $bddQuery = $bdd->prepare("SELECT * FROM GAME WHERE name_game LIKE ?");
    $bddQuery->execute([$searchTerm]); // Passez le terme de recherche avec les jokers inclus
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

?>