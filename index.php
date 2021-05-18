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
    <link rel="icon" href="/assets/images/logo.ico"/>
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>EzPizza</title>
</head>
<body>

<nav id="menu_calque_login">
    <div class="conteneur_login">
        <div class="contenu_menu_login">
            <ul>
                <?php
                if(isset($_SESSION['id'])){
                    echo "<a href='back/router.php/auth/signout'>Déconnecter</a>";
                } else {
                    echo "<li><a href='login.php'> LOG IN </a></li>";
                    echo "<li><a href='signup.php'> SIGN UP </a></li>";
                }



                ?>

            </ul>
        </div>
    </div>
</nav>

<nav id="accueil_ez_pizza">
    <div class="conteneur">
        <div class="row ligne_accueil_ez_pizza">

            <a href="#" class="accueil_ez_pizza left">
                <div>
                    <img src="/assets/images/logo.png" class="logo" alt="Logo de ez_pizza"/>
                    <img src="/assets/images/pizza_carton.jpg" alt="Discover our pizza">
                    <span> DISCOVER </span>

                </div>
            </a>


            <a href="create.php" class="accueil_ez_pizza right">
                <div>
                    <img src="/assets/images/pate_pizza.jpg" alt="Create your pizza">
                    <span> MAKE </span>
                </div>
            </a>

        </div>
    </div>
</nav>

<?php




?>


</body>
</html>
