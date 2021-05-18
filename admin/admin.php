<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['admin'] == 0){
    header('Location:/index.php');
}
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


    <!---  LES FORMULAIRES SERONT SUREMENT A FAIRE EN JS, ON VERRA --->
    <section class="allAdmin">
        <a href='/back/router.php/auth/signout' class='btn-signout'><img src='/assets/images/icons/log-out.svg'></a>

        <section class="forms">

            <h1 class="titleForm">ADD AN INGREDIENT</h1>
            <form method="POST" enctype="multipart/form-data" class="formNewIngredient">

                <input type="text" name="name" placeholder="Name of the ingredient" id="nameNewIngredient">

                <select name="type" id="typeNewIngredient">
                    <option value="topping">Topping</option>
                    <option value="sauce">Sauce</option>
                    <option value="dough">Dough</option>
                </select>

                <input type="number" step="0.01" name="price" id="priceNewIngredient" placeholder="Price of the ingredient">
                <label for="fileNewIngredient" class="label-import"><img src="/assets/images/icons/log-out.svg" class="img-import">Ajouter une image</label>
                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                <input name="image" type="file" id="fileNewIngredient" class="hide"/>

                <input type="submit" value="Valider">
            </form>



            <h1 class="titleForm">ADD A DRINK</h1>
            <form method="POST" enctype="multipart/form-data" class="formNewDrink">
                <input type="text" name="name" placeholder="Name of the drink" id="nameNewDrink">

                <input type="number" step="0.01" name="price" id="priceNewDrink" placeholder="Price of the drink">

                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                <label for="fileNewDrink" class="label-import"><img src="/assets/images/icons/log-out.svg" class="img-import">Ajouter une image</label>
                <input name="image" type="file" id="fileNewDrink" class="hide"/>

                <input type="submit" value="Valider">
            </form>

            <h1 class="titleForm">ADD A DESSERT</h1>
            <form method="POST" enctype="multipart/form-data" class="formNewDessert">
                <input type="text" name="name" placeholder="Name of the dessert" id="nameNewDessert">

                <input type="number" step="0.01" name="price" id="priceNewDessert" placeholder="Price of the dessert">

                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                <label for="fileNewDessert" class="label-import"><img src="/assets/images/icons/log-out.svg" class="img-import">Ajouter une image</label>
                <input name="image" type="file" id="fileNewDessert" class="hide"/>

                <input type="submit" value="Valider">
            </form>
        </section>
        <section class="allElements">
            <h1 class="titleAdmin">INGREDIENTS</h1>
            <div class="ingredient_admin">
            </div>


            <h1 class="titleAdmin">DRINKS</h1>
            <div class="drink_admin">
            </div>



            <h1 class="titleAdmin">DESSERTS</h1>
            <div class="dessert_admin">
            </div>
        </section>
    </section>




    <script src="/assets/js/root.js"></script>
    <script src="/assets/js/display/displayAdmin.js"></script>
    <script src="/assets/js/upload/uploadIngredient.js"></script>
    <script src="/assets/js/upload/uploadDrink.js"></script>
    <script src="/assets/js/upload/uploadDessert.js"></script>
    <script src="/assets/js/admin.js"></script>
</body>
</html>
