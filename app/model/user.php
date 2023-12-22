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