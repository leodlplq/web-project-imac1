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
    <title>EzPizza</title>
</head>
<body>
    Hello <?php  echo $_SESSION['mail']?>


    <a href="/back/router.php/auth/signout">Déconnecter</a>

    <!---  LES FORMULAIRES SERONT SUREMENT A FAIRE EN JS, ON VERRA --->
<br>
    FORM INGREDIENT
    <form action="/back/router.php/ingredients" method="POST">
        <input type="text" name="name" placeholder="name">
        
        <select name="type" id="">
            <option value="topping">Topping</option>
            <option value="sauce">Sauce</option>
            <option value="dough">Dough</option>
        </select>

        <input type="number" step="0.01" name="price">

        <input type="submit" value="Valider">
    </form>


    FORM DESSERT
    <form action="/back/router.php/desserts" method="POST">
        <input type="text" name="name" placeholder="name dessert">

        <input type="number" step="0.01" name="price">

        <input type="submit" value="Valider">
    </form>

    FORM DRINKS
    <form action="/back/router.php/drinks" method="POST">
        <input type="text" name="name" placeholder="name drink">

        <input type="number" step="0.01" name="price">

        <input type="submit" value="Valider">
    </form>
</body>
</html>
