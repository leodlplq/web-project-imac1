<?php
//on fait les require ici
require_once(__DIR__ . '/controller/ingredientController.php');
require_once(__DIR__ . '/controller/drinkController.php');

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
                //
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
        }

        break;

    case "drinks":
        switch ($method) {
            case 'GET':
                //give all the drinks from the db
                echo getJSONofAllDrinks();
                break;

            case 'POST':
                //
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
        }

        break;
};



