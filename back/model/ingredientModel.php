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

    return getJSONofAllIngredients();
    //header('Location: /admin/admin.php');

}

function changeIngredientInDB($name, $type, $price, $urlImage, $id){
    $pdo = connection();

    if($urlImage == null){
        $sql = "UPDATE ingredients SET nomIngredient = ?, typeIngredient = ?, prixIngredient = ? WHERE idIngredient = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $type,
            $price,
            $id
        ]);
    } else {
        $sql = "UPDATE ingredients SET nomIngredient = ? ,typeIngredient = ?,prixIngredient = ?, urlImageIngredient = ? WHERE idIngredient = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $type,
            $price,
            $urlImage,
            $id
        ]);


        //header('Location: /admin/admin.php');
    }

    return getJSONofAllIngredients();

}

function deleteIngredientFromDB($id){
    $pdo = connection();
    $sql = "DELETE FROM ingredients WHERE idIngredient = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id
    ]);

    return getJSONofAllIngredients();
    //header('Location: /admin/admin.php');
}

function getIngredientOfPizza($id){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients AS i
            JOIN ingredient_pizza AS ip ON ip.idIngredient = i.idIngredient 
            WHERE ip.idPizza = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id
    ]);

    return $query->fetchall();
}

function getDoughIngredients(){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients WHERE typeIngredient = 'dough'";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getSauceIngredients(){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients WHERE typeIngredient = 'sauce'";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getToppingIngredients(){
    $pdo = connection();
    $sql = "SELECT * FROM ingredients WHERE typeIngredient = 'topping'";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}
