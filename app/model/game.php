<?php

require_once 'db_config.php';

function info_game()
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM GAME");
    $bddQuery->execute();
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
    
}
?>