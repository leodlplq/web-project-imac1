<?php


require_once(realpath(__DIR__) . '/connection.php');

function getAllDesserts()
{
    $pdo = connection();
    $sql = "SELECT * FROM DESSERT";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getOneDessert($id)
{
    $pdo = connection();
    $sql = "SELECT * FROM DESSERT WHERE idDessert = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}

function postNewDessert($name, $price, $url){

    $pdo = connection();
    $sql = "INSERT INTO DESSERT(nomDessert, prixDessert , urlImageDessert ) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([
        $name,
        $price,
        $url
    ]);


    return getJSONofAllDesserts();
    //header('Location: /admin/admin.php');

}

function changeDessertInDB($name, $price, $urlImage, $id){
    $pdo = connection();

    if($urlImage == null){
        $sql = "UPDATE DESSERT SET nomDessert = ?, prixDessert = ? WHERE idDessert = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $price,
            $id
        ]);
    } else {
        $sql = "UPDATE DESSERT SET nomDessert = ? ,prixDessert = ?, urlImageDessert = ? WHERE idDessert = ?";
        $query = $pdo->prepare($sql);
        $query->execute([
            $name,
            $price,
            $urlImage,
            $id
        ]);

        //header('Location: /admin/admin.php');
    }

    //return getAllDesserts();
    return getJSONofAllDesserts();
}

function deleteDessertFromDB($id){
    $pdo = connection();
    $sql = "DELETE FROM DESSERT WHERE idDessert = ?";
    $query = $pdo->prepare($sql);
    $query->execute([
        $id
    ]);

    //return getAllDesserts();
    //header('Location: /admin/admin.php');
    return getJSONofAllDesserts();
}

function getDessertOfOrder($id){
    $pdo = connection();
    $sql = "SELECT * FROM DESSERT AS d
            JOIN CONTIENT_DESSERT AS cd ON cd.idDessert = d.idDessert
            WHERE cd.idCommande = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}
