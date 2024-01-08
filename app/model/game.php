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


?>