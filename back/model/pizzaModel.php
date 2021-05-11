<?php

require_once(__DIR__ . '/connection.php');

function getAllPizzas(){
    $pdo = connection();
    $sql = "SELECT * FROM PIZZA";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getOnePizza($id){
    $pdo = connection();
    $sql = "SELECT * FROM PIZZA WHERE idPizza = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}

function getAllExistingPizzas(){
    $pdo = connection();
    $sql = "SELECT * FROM PIZZA WHERE existe = 1";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getAllUniquePizzas(){
    $pdo = connection();
    $sql = "SELECT * FROM PIZZA WHERE existe = 0";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function postNewUniquePizza($id, $name){

    $pdo = connection();
    $sql = "INSERT INTO PIZZA(idPizza, nomPizza, existe) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id,
        $name,
        0
    ]);
}

function postNewIngredientOnPizza($idPizza, $idIngredient){
    $pdo = connection();
    $sql = "INSERT INTO INGREDIENT_PIZZA(idPizza, idIngredient, nbIngredient) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idPizza,
        $idIngredient,
        1
    ]);

}


function deleteIngredientOnPizza($idIngredient){
    $pdo = connection();
    $sql = "DELETE FROM INGREDIENT_PIZZA WHERE idIngredient = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idIngredient
    ]);

}

function getPizzaInOrder($id){
    $pdo = connection();
    $sql = "SELECT * FROM PIZZA AS p 
            JOIN CONTIENT_PIZZA AS cp ON cp.idPizza = p.idPizza
            WHERE cp.idCommande = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id
    ]);

    return $query->fetchAll();
}

