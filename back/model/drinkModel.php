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

function postNewDrink($name, $price, $url){

    $pdo = connection();
    $sql = "INSERT INTO boisson(nomBoisson, prixBoisson , urlImageBoisson ) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $name,
        $price,
        $url
    ]);
    return getJSONofAllDrinks();
   //header('Location: /admin/admin.php');

}

function changeDrinkInDB($name, $price, $urlImage, $id){
    $pdo = connection();

    if($urlImage == null){
        $sql = "UPDATE boisson SET nomBoisson = ?, prixBoisson = ? WHERE idBoisson = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $price,
            $id
        ]);
    } else {
        $sql = "UPDATE boisson SET nomBoisson = ? ,prixBoisson = ?, urlImageBoisson = ? WHERE idBoisson = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $price,
            $urlImage,
            $id
        ]);

        //header('Location: /admin/admin.php');
    }

    return getJSONofAllDrinks();

}

function deleteDrinkFromDB($id){
    $pdo = connection();
    $sql = "DELETE FROM boisson WHERE idBoisson = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id
    ]);

    return getJSONofAllDrinks();
    //header('Location: /admin/admin.php');
}
