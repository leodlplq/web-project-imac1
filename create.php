<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location:login.php');
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
    <link rel="icon" href="/assets/images/logo.ico" />
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>EzPizza</title>
</head>
<body>



<section class="create">
    <?php

    if(isset($_SESSION['id'])){
        echo "<span data-id=".$_SESSION['id']." class='hide idUser'></span>";
    }
    ?>

    <a href='/back/router.php/auth/signout' class='btn-signout'><img src='assets/images/icons/log-out.svg'></a>
    <div class="ingredients">

        <h1 class="title_create">CREATE YOUR OWN PIZZA <?php echo $_SESSION['firstname'] ?></h1>
        <form action="" class="orderForm">
        <div class="pizza">
            <div class="dough">
                <h1 class="subtitle_create">dough</h1>
                <div class="doughContainer">

                </div>
            </div>
            <div class="sauce">
                <h1 class="subtitle_create">sauce</h1>
                <div class="sauceContainer">

                </div>
            </div>
            <div class="topping">
                <h1 class="subtitle_create">ingredients</h1>
                <div class="toppingContainer">

                </div>
            </div>

            <input type="text" id="pizzaNameInput" placeholder="give a name to your pizza">

            <div class="btn-prev-next">
                <a href="" class="next-btn" id="nextBtn1">Next</a>
            </div>

        </div>

        <div class="drink hide">
            <div class="chooseDrink">
                <h1 class="title_drink">Choose one or many drinks</h1>
                <div class="drinkContainer"></div>

                <div class="btn-prev-next">
                    <a href="" class="prev-btn" id="prevBtn1">Previous</a>
                    <a href="" class="next-btn" id="nextBtn2">Next</a>
                </div>

            </div>

        </div>

        <div class="dessert hide">
             <div class="chooseDessert">
                 <h1 class="title_dessert">Choose one or many desserts</h1>
                 <div class="dessertContainer"></div>

                 <div class="validation-order">
                     <input type="submit" value="ORDER IT, RIGHT NOW !" class="btn-submit">
                 </div>


                 <div class="btn-prev-next">
                    <a href="" class="prev-btn" id="prevBtn2">Previous</a>
                 </div>
             </div>
        </div>



        </form>
    </div>

    <div class="orderRecap">




    </div>
</section>



<script src="/assets/js/root.js"></script>

<script src="/assets/js/display/displayOrder.js"></script>
<script src="/assets/js/display/displayElements.js"></script>
<script src="/assets/js/upload/uploadOrder.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
