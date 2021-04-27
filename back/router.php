<?php
//on fait les require ici
require_once(__DIR__ . '/controller/ingredientController.php');
require_once(__DIR__ . '/controller/drinkController.php');
require_once(__DIR__ . '/controller/dessertController.php');
require_once(__DIR__ . '/controller/authController.php');

header('Content-type: text/javascript');
//getting information to do the router.
$method = $_SERVER['REQUEST_METHOD'];
$url = explode('/', $_SERVER['REQUEST_URI']);

//var_dump($url); //some testing.

switch($url[3]){

    case 'ingredients':

        switch ($method) {
            case 'GET':
                //give all the ingredients from the db
                echo getJSONofAllIngredients();
                break;

            case 'POST':
                echo addIngredient($_POST);
                break;

            default:
                # code...
                break;
        }
        break;

    case "ingredient":

        switch ($method){
            case 'GET':

                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo getJSONofOneIngredient($id);

                } else {
                    echo 'Wrong parameters, should looks like /ingredient/4 or another number.';
                }

                break;

            case 'POST':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo updateIngredient($_POST, $id);

                } else {
                    echo 'Wrong parameters, should looks like /ingredient/4 or another number.';
                }
                break;

            case 'DELETE':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo deleteIngredient($id);

                } else {
                    echo 'Wrong parameters, should looks like /ingredient/4 or another number.';
                }
                break;
        }

        break;

    case "drinks":
        switch ($method) {
            case 'GET':
                //give all the drinks from the db
                echo getJSONofAllDrinks();
                break;

            case 'POST':
                echo addDrink($_POST);
                break;

            default:
                # code...
                break;
        }
        break;

    case "drink":

        switch ($method){
            case 'GET':

                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo getJSONofOneDrink($id);

                } else {
                    echo 'Wrong parameters, should looks like /drink/4 or another number.';
                }

                break;

            case 'POST':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo updateDrink($_POST, $id);

                } else {
                    echo 'Wrong parameters, should looks like /drink/4 or another number.';
                }
                break;

            case 'DELETE':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo deleteDrink($id);

                } else {
                    echo 'Wrong parameters, should looks like /drink/4 or another number.';
                }
                break;
        }

        break;

    case "desserts":
        switch ($method) {
            case 'GET':
                //give all the drinks from the db
                echo getJSONofAllDesserts();
                break;

            case 'POST':
                echo addDessert($_POST);
                break;

            default:
                # code...
                break;
        }
        break;

    case "dessert":
        switch ($method){
            case 'GET':

                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo getJSONofOneDessert($id);

                } else {
                    echo 'Wrong parameters, should looks like /dessert/4 or another number.';
                }

                break;

            case 'POST':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo updateDessert($_POST, $id);

                } else {
                    echo 'Wrong parameters, should looks like /dessert/4 or another number.';
                }
                break;

            case 'DELETE':
                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo deleteDessert($id);

                } else {
                    echo 'Wrong parameters, should looks like /dessert/4 or another number.';
                }
                break;
        }
        break;

    case "auth":
        switch ($method){
            case 'POST':

                if($url[count($url) - 1] == "signup"){
                    createANewUser($_POST);
                } else if($url[count($url) - 1] == "login") {
                    loginUser($_POST);
                } else {

                    echo 'Wrong parameters';
                }

                break;

            case 'GET':
                if($url[count($url) - 1] == "signout"){
                    signOut();
                } else {
                    echo "Wrong parameters";
                }
                break;
        }


        break;

};



