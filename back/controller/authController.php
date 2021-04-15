<?php

require_once(__DIR__ . '/../model/authModel.php');

//function called when a new user is created
function createANewUser($post){

    $password_hash = password_hash($post['pwd'], PASSWORD_DEFAULT);
    $nom = $post['nom'];
    $prenom = $post['prenom'];
    $mail = $post['mail'];

    createAccount($nom, $prenom, $password_hash, $mail);

}

function loginUser($post){
    //  Récupération de l'utilisateur et de son pass hashé
    $mail = $post['mail'];
    $data = getAccount($mail);


    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($post['pwd'], $data['mdpClient']);

    if (!$data)
    {
        //pas de data trouvé avec le mail
        header('Location: /index.php?e=2');
    }
    else
    {
        if ($isPasswordCorrect) {
            //on se connecte c'est ok
            session_start();
            $_SESSION['id'] = $data['idClient'];
            $_SESSION['mail'] = $data['mailClient'];

            header('Location: /index.php');


        }
        else {
            //mauvais mdp ou mail
            header('Location: /index.php?e=3');
        }
    }
}

