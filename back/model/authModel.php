<?php


require_once(__DIR__ . './connection.php');

//hashing the pwd to put it in the database.
function createAccount($nom, $prenom ,$password_hash, $mail){
    //insertion into the database.

    var_dump($nom);
    try {
        echo "test";
        $pdo = connection();
        $sql = "INSERT INTO client(nomClient, prenomClient, mdpClient, mailClient) VALUES(?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([
            $nom,
            $prenom,
            $password_hash,
            $mail
        ]);

        //TODO : rediriger par la suite vers la page login directement.
        header('Location: /index.php');

    } catch(\PDOException $e) {
        echo $e->getCode();
        echo $e->getMessage();
        if($e->getCode() == 23000){ // duplicata du champ mail
            header('Location: /index.php?e=1');
        }

    }

}

function getAccount($mail){
    $pdo = connection();
    $sql = 'SELECT * FROM client WHERE mailClient = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$mail]);

    return $query->fetch();
}





