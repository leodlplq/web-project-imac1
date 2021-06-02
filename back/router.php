<?php
//on fait les require ici
require_once(realpath(__DIR__) . '/controller/ingredientController.php');
require_once(realpath(__DIR__) . '/controller/drinkController.php');
require_once(realpath(__DIR__) . '/controller/dessertController.php');
require_once(realpath(__DIR__) . '/controller/authController.php');
require_once(realpath(__DIR__) . '/controller/pizzaController.php');
require_once(realpath(__DIR__) . '/controller/orderController.php');

require_once (realpath(__DIR__). '/root.php');

header('Content-type: text/javascript');
//getting information to do the router.
$method = $_SERVER['REQUEST_METHOD'];
$url = explode('/', $_SERVER['REQUEST_URI']);



$urlAdding = count(explode("/", root())) - 1;
$nbUrl = 3 + $urlAdding;

//var_dump($url); //some testing.
//var_dump($nbUrl); //some testing.

switch($url[$nbUrl]){

    case 'ingredients':

        if(isset($url[$nbUrl+1])){
            switch ($url[$nbUrl+1]){
                case "dough":
                    echo getJSONofDough();
                    break;

                case "sauce":
                    echo getJSONofSauce();
                    break;

                case "topping":
                    echo getJSONofTopping();
                    break;

                default:

                    break;
            }
        } else {
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


    case "pizzas":

        if(isset($url[$nbUrl+1])){
            switch ($url[$nbUrl+1]){
                case 'unique':
                    switch ($method){
                        case 'POST':
                            //
                            break;

                        case 'GET':
                            echo getJSONofAllUniquePizza();
                            break;

                    }
                    break;

                case 'existing':
                    switch ($method){
                        case 'POST':
                            //
                            break;

                        case 'GET':
                            echo getJSONofAllExistingPizza();
                            break;

                    }
                    break;

                default:

                    break;

            }
        } else {
            switch ($method){
                case 'POST':
                    echo addPizza($_POST);
                    break;

                case 'GET':
                    echo getJSONofAllPizza();
                    break;

            }
        }




        break;

    case "pizza":
        switch ($method){
            case 'POST':

                //

                break;

            case 'GET':

                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo getJSONofPizza($id);

                } else {
                    echo 'Wrong parameters, should looks like /pizza/4 or another number.';
                }
                break;

        }
        break;

    case "orders":

        if(isset($url[$nbUrl+1])){
            switch ($url[$nbUrl+1]){

                case 'existing':
                    switch ($method){
                        case 'POST':
                            echo addExistingPizzaInOrder($_POST);
                            break;

                        case 'GET':
                            //echo getJSONofAllUniquePizza();
                            break;

                    }
                    break;

                case 'pizza':
                    switch ($method){
                        case 'POST':
                            addPizzaInOrder($_POST);
                            break;

                        case 'GET':
                            //echo getJSONofAllUniquePizza();
                            break;

                    }
                    break;

                case 'dessert':
                    switch ($method){
                        case 'POST':
                            addDessertInOrder($_POST);
                            break;

                        case 'GET':
                            //echo getJSONofAllExistingPizza();
                            break;

                    }
                    break;

                case 'drink':
                    switch ($method){
                        case 'POST':
                            addDrinkInOrder($_POST);
                            break;

                        case 'GET':
                            //echo getJSONofAllExistingPizza();
                            break;

                    }
                    break;

                default:

                    break;

            }
        } else {
            switch ($method){
                case 'POST':
                    echo addEverythingInOrder($_POST);
                    break;

                case 'GET':
                    echo getJSONofAllOrder();
                    break;

            }
        }

        break;

    case "order":
        switch ($method){
            case 'POST':

                //

                break;

            case 'GET':

                if(is_numeric($url[count($url) - 1])){
                    $id = intval($url[count($url) - 1]);
                    echo getJSONofOrder($id);

                } else {
                    echo 'Wrong parameters, should looks like /order/4 or another number.';
                }
                break;

        }
        break;


};



