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

<a href="login.php">Log in</a>
<a href="signup.php">Sign up</a>

<?php



if(isset($_SESSION['id'])){
    $mail = $_SESSION['mail'];
    echo "salut $mail";
    echo "<a href='back/router.php/auth/signout'>Déconnecter</a>";

    echo "<a href='create.php'>Create</a>";
}
?>


</body>
</html>
