<?php

require_once(__DIR__ . '/connection.php');

function getAllOrder(){
    $pdo = connection();
    $sql = "SELECT * FROM COMMANDE";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getOneOrder($id){
    $pdo = connection();
    $sql = "SELECT * FROM COMMANDE WHERE idCommande = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchAll();
}

function postNewPizzaInOrder($idOrder, $idPizza)
{
    $pdo = connection();
    $sql = "INSERT INTO CONTIENT_PIZZA(idCommande, idPizza, nbPizza) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idOrder,
        $idPizza,
        1
    ]);

}

function postNewOrder($idOrder, $idClient){
    $pdo = connection();
    $sql = "INSERT INTO COMMANDE(idCommande, dateCommande, idClient) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idOrder,
        date("Y-m-d H:i:s"),
        $idClient
    ]);

    return getJSONofAllOrder();
}

function postNewDessertOrder($idOrder, $idDessert){
    $pdo = connection();
    $sql = "INSERT INTO CONTIENT_DESSERT(idCommande, idDessert, nbDessert) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idOrder,
        $idDessert,
        1
    ]);
}

function postNewDrinkOrder($idOrder, $idDrink){
    $pdo = connection();
    $sql = "INSERT INTO CONTIENT_BOISSON(idCommande, idBoisson, nbBoisson) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $idOrder,
        $idDrink,
        1
    ]);
}
