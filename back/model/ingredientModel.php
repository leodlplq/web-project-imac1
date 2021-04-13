<?php
require_once(__DIR__ . '/connection.php');

function getAllIngredients(){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getOneIngredient($id){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients WHERE idIngredient = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}
