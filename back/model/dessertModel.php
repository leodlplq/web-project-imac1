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
