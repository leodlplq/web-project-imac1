<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:index.php");
}

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
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>EzPizza</title>
</head>
<body>

<div class="login">
    <h1 class="title_login">log in</h1>

    <form action="back/router.php/auth/login" method="POST" class="login_form">
        <input type="text" name="mail"  placeholder="mail">
        <input type="password" name="pwd" placeholder="password">
        <input type="hidden" value="0" name="link">

        <input type="submit" value="se connecter">
    </form>
</div>



</body>
</html>

