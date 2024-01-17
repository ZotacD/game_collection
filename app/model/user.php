<?php
require_once 'db_config.php';

function addUser($fname_user, $name_user, $mail_user, $password_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("INSERT INTO PERSON(fname_user, name_user, mail_user, password_user) VALUES (:fname_user, :name_user, :mail_user, :password_user);");
    $bddQuery->execute([
        "fname_user" => htmlspecialchars($fname_user),
        "name_user" => htmlspecialchars($name_user),
        "mail_user" => htmlspecialchars($mail_user),
        "password_user" => htmlspecialchars($password_user),
    ]);
}

function updateUser($id_user, $fname_user, $name_user, $mail_user, $password_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("UPDATE PERSON SET fname_user=:fname_user, name_user=:name_user, mail_user=:mail_user, password_user=:password_user WHERE id_user=:id_user;");
    $bddQuery->execute([
        "id_user" => htmlspecialchars($id_user),
        "fname_user" => htmlspecialchars($fname_user),
        "name_user" => htmlspecialchars($name_user),
        "mail_user" => htmlspecialchars($mail_user),
        "password_user" => htmlspecialchars($password_user),
    ]);
}

function removeUser($id_user)
{
    $bdd = dbConnect();

    $bddQuery = $bdd->prepare("DELETE FROM LIBRARY WHERE id_user=:id_user;");
    $bddQuery->execute([
        "id_user" => $id_user,
    ]);

    $bddQuery = $bdd->prepare("DELETE FROM PERSON WHERE id_user=:id_user;");
    $bddQuery->execute([
        "id_user" => $id_user,
    ]);
}

function getUser($mail_user = "", $password_user = "")
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM PERSON WHERE (mail_user=:mail_user AND password_user=:password_user)");
    $bddQuery->execute([
        "mail_user" => $mail_user,
        "password_user" => $password_user,
    ]);
    return $bddQuery->fetch(PDO::FETCH_ASSOC);
}

function getUserByEmail($mail_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM PERSON WHERE mail_user=:mail_user");
    $bddQuery->execute([
        "mail_user" => $mail_user,
    ]);
    return $bddQuery->fetch(PDO::FETCH_ASSOC);
}

function getUserById($id_user)
{
    $bdd = dbConnect();
    $bddQuery = $bdd->prepare("SELECT * FROM PERSON WHERE id_user=:id_user");
    $bddQuery->execute([
        "id_user" => $id_user,
    ]);
    return $bddQuery->fetch(PDO::FETCH_ASSOC);
}

function getUsersRank()
{
    $bdd = dbConnect();

    $bddQuery = $bdd->prepare("SELECT PERSON.fname_user, PERSON.name_user, MAX(LIBRARY.hours_played) AS 'hours_played', GAME.name_game 
    FROM PERSON 
    INNER JOIN LIBRARY ON LIBRARY.id_user=PERSON.id_user 
    INNER JOIN GAME ON GAME.id_game=LIBRARY.id_game 
    WHERE hours_played = (SELECT MAX(hours_played) FROM LIBRARY WHERE id_user = PERSON.id_user)
    GROUP BY person.id_user ORDER BY hours_played DESC");

    $bddQuery->execute();
    return $bddQuery->fetchAll(PDO::FETCH_ASSOC);
}