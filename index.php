<?php
session_start();
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


partie connextion :

<form action="/back/router.php/auth/login" method="POST">
    <input type="text" name="mail"  placeholder="mail">
    <input type="password" name="pwd" placeholder="password">

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
}
?>
</body>
</html>
