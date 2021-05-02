<?php
session_start();


/*
    description of the error.

    e =
        1 : adresse mail deja existante
        2 : pas d'adresse mail dans la db
        3 : couple mdp/mail mauvais
        4 : accès a admin sans connexion
        5 : tentative de déconnexion mais pas connecter
*/
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EzPizza</title>
</head>
<body>


partie connexion :

<form action="/back/router.php/auth/login" method="POST">
    <input type="text" name="mail"  placeholder="mail">
    <input type="password" name="pwd" placeholder="password">
    <input type="hidden" value="0" name="link">

    <input type="submit" value="se connecter">
</form>

partie création :

<form action="/back/router.php/auth/signup" method="POST">

    <input type="text" name="prenom" placeholder="prenom">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="mail" placeholder="mail">
    <input type="password" name="pwd" placeholder="password">

    <input type="submit" value="se créer un compte">
</form>

<?php



if(isset($_SESSION['id'])){
    $mail = $_SESSION['mail'];
    echo "salut $mail";
    echo "<a href='/back/router.php/auth/signout'>Déconnecter</a>";

    echo "<a href='create.php'>Create</a>";
}
?>


</body>
</html>
