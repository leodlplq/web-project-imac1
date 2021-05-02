<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location:index.php');
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
    <title>EzPizza</title>
</head>
<body>


<?php

if(isset($_SESSION['id'])){
    $mail = $_SESSION['mail'];
    echo "salut $mail";
    echo "<a href='/back/router.php/auth/signout'>Déconnecter</a>";
}
?>

<div class="ingredients">

    <form action="" class="pizzaForm">

    <div class="dough">
        <h1>Choose your dough</h1>
        <div class="doughContainer">

        </div>
    </div>
    <div class="sauce">
        <h1>Choose your sauce</h1>
        <div class="sauceContainer">
            
        </div>
    </div>
    <div class="topping">
        <h1>Choose many ingredients</h1>
        <div class="toppingContainer">

        </div>
    </div>

        <input type="text" id="pizzaNameInput" placeholder="give a name to your pizza">
        <input type="submit" value="COMMANNNNNNDERRR MA PIZZAAA">
    </form>
</div>


<script src="/assets/js/root.js"></script>
<script src="/assets/js/display/displayElements.js"></script>
<script src="/assets/js/upload/uploadPizza.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
