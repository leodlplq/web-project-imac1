<?php
require_once(__DIR__ . '/connection.php');

function getAllDrinks(){
    $pdo = connection();
    $sql = "SELECT * FROM boisson";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getOneDrink($id){
    $pdo = connection();
    $sql = "SELECT * FROM boisson WHERE idBoisson = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}
