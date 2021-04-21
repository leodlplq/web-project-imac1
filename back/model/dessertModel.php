<?php


require_once(__DIR__ . '/connection.php');

function getAllDesserts()
{
    $pdo = connection();
    $sql = "SELECT * FROM dessert";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getOneDessert($id)
{
    $pdo = connection();
    $sql = "SELECT * FROM dessert WHERE idDessert = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}

function postNewDessert($name, $price, $url){

    $pdo = connection();
    $sql = "INSERT INTO dessert(nomDessert, prixDessert , urlImageDessert ) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $name,
        $price,
        $url
    ]);

    header('Location: /admin/admin.php');

}
