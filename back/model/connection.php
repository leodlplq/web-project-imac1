<?php

require_once("informationDB.php");


function connection(){

    global $host, $db, $username, $password;

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db", "$username", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br />";
        die(1);
    }

    return $pdo;
}
