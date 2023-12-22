<?php
require_once 'db-config.php';

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

function updateUser()
{

}

function removeUser()
{

}