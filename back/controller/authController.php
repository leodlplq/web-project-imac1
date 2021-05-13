<?php

require_once(realpath(realpath(__DIR__)) . '/../model/authModel.php');
require_once(realpath(realpath(__DIR__)) . '/../root.php');

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
    $link = $post['link'];
    $isAdmin = $data['admin'];

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($post['pwd'], $data['mdpClient']);

    if (!$data)
    {
        //pas de data trouvé avec le mail
        if($link){
            $url = root()."/admin/login.php?e=2";
            header("Location: $url");
        } else {
            $url = root()."/index.php?e=2";
            header("Location: $url");
        }

    }
    else
    {
        if ($isPasswordCorrect) {
            //on se connecte c'est ok
            session_start();
            $_SESSION['id'] = intval($data['idClient']);
            $_SESSION['mail'] = $data['mailClient'];
            $_SESSION['admin'] = intval($data['admin']);
            $_SESSION['firstname'] = $data['prenomClient'];
            $_SESSION['lastname'] = $data['nomClient'];



            if($isAdmin){
                $url = root()."/admin/admin.php";
                header("Location: $url");

            } else {
                $url = root()."/index.php";
                header("Location: $url");

            }


        }
        else {
            //mauvais mdp ou mail
            if($link){
                $url = root()."/admin/login.php?e=3";
                header("Location: $url");

            } else {
                $url = root()."/index.php?e=3";
                header("Location: $url");

            }
        }
    }
}

function signOut(){
    session_start();

    if(isset($_SESSION['id'])){ // Si tu es connecté on te déconnecte et on te redirige vers une page.

        // Supression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Supression des cookies de connexion automatique

        $url = root()."/index.php?deco=1";
        header("Location: $url");


    }else{ // Dans le cas contraire on t'empêche d'accéder à cette page en te redirigeant vers la page que tu veux.

        $url = root()."/index.php?e=5";
        header("Location: $url");
        
    }
}

