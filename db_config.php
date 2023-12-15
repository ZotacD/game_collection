<?php
    function db_config(){
        $bdd = new PDO('mysql:host=' . $_ENV["DB_HOST"] . ';dbname=' . $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        return $bdd;
    }
?>