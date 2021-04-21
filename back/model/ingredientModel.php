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

function postNewIngredient($name, $type, $price, $url){

    $pdo = connection();
    $sql = "INSERT INTO ingredients(nomIngredient, typeIngredient, prixIngredient , urlImageIngredient ) VALUES(?,?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $name,
        $type,
        $price,
        $url
    ]);

    header('Location: /admin/admin.php');

}
