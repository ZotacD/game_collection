<?php
require_once 'db_config.php';

function addUser($fname_user, $name_user, $mail_user, $password_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("INSERT INTO PERSON(fname_user, name_user, mail_user, password_user) VALUES (:fname_user, :name_user, :mail_user, :password_user);");
    $bddQuery->execute([
        "fname_user" => $fname_user,
        "name_user" => $name_user,
        "mail_user" => $mail_user,
        "password_user" => $password_user,
    ]);
}

function updateUser($id_user, $fname_user, $name_user, $mail_user, $password_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("UPDATE PERSON SET fname_user=:fname_user, name_user=:name_user, mail_user=:mail_user, password_user=:password_user WHERE id_use:id_user;");
    $bddQuery->execute([
        "id_user" => $id_user,
        "fname_user" => $fname_user,
        "name_user" => $name_user,
        "mail_user" => $mail_user,
        "password_user" => $password_user,
    ]);
}

function removeUser($id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("DELETE FROM PERSON WHERE id_use=:id_user;");
    $bddQuery->execute([
        "id_user" => $id_user,
    ]);
}

function getUser($mail_user = "", $password_user = "", $id_user = -1)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM PERSON WHERE (mail_user=:mail_user AND password_user=:password_user) OR id_user=:id_user");
    $bddQuery->execute([
        "id_user" => $id_user,
        "mail_user" => $mail_user,
        "password_user" => $password_user,
    ]);
    return $bddQuery->fetch(PDO::FETCH_ASSOC);
}

function getUsersRank()
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT PERSON.fname_user, PERSON.name_user, LIBRARY.hours_played, GAME.name_game 
    FROM PERSON 
    INNER JOIN LIBRARY ON LIBRARY.id_user=PERSON.id_user 
    INNER JOIN GAME ON GAME.id_game=LIBRARY.id_game 
    WHERE LIBRARY.hours_played IN (SELECT MAX(hours_played) FROM LIBRARY GROUP BY id_game)");

    $bddQuery = $bdd->prepare("SELECT PERSON.fname_user, PERSON.name_user, MAX(LIBRARY.hours_played) AS 'hours_played', GAME.name_game 
    FROM PERSON 
    INNER JOIN LIBRARY ON LIBRARY.id_user=PERSON.id_user 
    INNER JOIN GAME ON GAME.id_game=LIBRARY.id_game 
    GROUP BY PERSON.id_user ORDER BY hours_played DESC");

    $bddQuery->execute();
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}