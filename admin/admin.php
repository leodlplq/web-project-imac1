<?php
session_start();

if(!isset($_SESSION['id']) && $_SESSION['admin'] != 1){
    header('Location: /admin/login.php?e=4');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/css/style.css">
    <title>EzPizza</title>
</head>
<body>
    Hello <?php  echo $_SESSION['mail']?>


    <a href="/back/router.php/auth/signout">Déconnecter</a>

    <!---  LES FORMULAIRES SERONT SUREMENT A FAIRE EN JS, ON VERRA --->
<br>
    FORM INGREDIENT
    <form method="POST" enctype="multipart/form-data" class="formNewIngredient">

        <input type="text" name="name" placeholder="name" id="nameNewIngredient">
        
        <select name="type" id="typeNewIngredient">
            <option value="topping">Topping</option>
            <option value="sauce">Sauce</option>
            <option value="dough">Dough</option>
        </select>

        <input type="number" step="0.01" name="price" id="priceNewIngredient">

        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
        Envoyez ce fichier : <input name="image" type="file" id="fileNewIngredient"/>

        <input type="submit" value="Valider">
    </form>


    <br><br><br>
    FORM DRINKS
    <form method="POST" enctype="multipart/form-data" class="formNewDrink">
        <input type="text" name="name" placeholder="name drink" id="nameNewDrink">

        <input type="number" step="0.01" name="price" id="priceNewDrink">

        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
        Envoyez ce fichier : <input name="image" type="file" id="fileNewDrink"/>

        <input type="submit" value="Valider">
    </form>

    <br><br><br>
    FORM DESSERT
    <form method="POST" enctype="multipart/form-data" class="formNewDessert">
        <input type="text" name="name" placeholder="name dessert" id="nameNewDessert">

        <input type="number" step="0.01" name="price" id="priceNewDessert">

        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
        Envoyez ce fichier : <input name="image" type="file" id="fileNewDessert"/>

        <input type="submit" value="Valider">
    </form>




    <br><br><br>
    INGREDIENT
    <div class="ingredient">
    </div>
    <br><br><br>

    BOISSON
    <div class="drink">
    </div>
    <br><br><br>


    DESSERT
    <div class="dessert">
    </div>




    <script src="/assets/js/display/displayAdmin.js"></script>
    <script src="/assets/js/upload/uploadIngredient.js"></script>
    <script src="/assets/js/upload/uploadDrink.js"></script>
    <script src="/assets/js/upload/uploadDessert.js"></script>
    <script src="/assets/js/admin.js"></script>
</body>
</html>
