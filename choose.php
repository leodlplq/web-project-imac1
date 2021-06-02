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
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Ez Pizza - Choose</title>
    <link rel="icon" href="/assets/images/logo.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

</head>

<body>


<?php

if(isset($_SESSION['id'])){
    echo "<span data-id=".$_SESSION['id']." class='hide idUser'></span>";
}
?>
<section class="choose">

    <a href="index.php" class="logoEzpizza">
        <img src="/assets/images/logo.png" alt="Discover our pizza">
    </a>

    <section class="vitrine">
        <h1 class="vitrine_title">PICK AN EXISTING PIZZA</h1>

        <div class="vitrine_carroussel">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">

                    </ul>
                </div>
            </div>


            <div class="btn-prev-next bottom-40">

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


    </section>

    <div class="orderRecap">




    </div>
    <section class="loveBanderole">
        <h1>OUR PIZZA ARE MADE WITH LOVE <img alt="<3" src="/assets/images/loveBanderole_heart.png" class="loveBanderole_heart"></h1>
    </section>
    <section class="seepizza">
        <h2>YOU CAN ALSO CREATE YOUR OWN</h2>
        <a class='seepizza_herebutton' href="create.php">
            <h1>HERE <img alt=">" src="/assets/images/fleche.png" class="seepizza_herebutton_fleche"> <img alt=">" src="/assets/images/fleche.png" class="seepizza_herebutton_fleche"></h1>
        </a>
    </section>
</section>

<script src="/assets/js/root.js"></script>
<script src="/assets/js/display/displayOrder.js"></script>
<script src="/assets/js/display/displayElements.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
<script src="/assets/js/choose.js"></script>
</body>
</html>
