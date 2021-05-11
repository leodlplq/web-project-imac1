<?php
session_start();
require_once(__DIR__ . '/../model/pizzaModel.php');
require_once(__DIR__ . '/ingredientController.php');
require_once(__DIR__ . '/../toolkit.php');

function getJSONofAllPizza(){
    $pizzas = getAllPizzas();
    $i = 0;

    if(count($pizzas) != 0){
        foreach ($pizzas as $pizza => $tab){

            $ingredients = getJSONofIngredientOnPizza($tab["idPizza"]);

            $json["data"][$i] = [
                'id'=>$tab["idPizza"],
                'name'=>$tab["nomPizza"],
                'existingOne'=>$tab["existe"],
                'ingredients'=>$ingredients["ingredient"],
                'price'=>$ingredients['price']

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }

    $json['nb'] = $i;

    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}

function getJSONofAllExistingPizza(){
    $pizzas = getAllExistingPizzas();
    $i = 0;

    if(count($pizzas) != 0){
        foreach ($pizzas as $pizza => $tab){

            $ingredients = getJSONofIngredientOnPizza($tab["idPizza"]);

            $json["data"][$i] = [
                'id'=>$tab["idPizza"],
                'name'=>$tab["nomPizza"],
                'existingOne'=>$tab["existe"],
                'ingredients'=>$ingredients["ingredient"],
                'price'=>$ingredients['price']

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }

    $json['nb'] = $i;

    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}

function getJSONofAllUniquePizza(){
    $pizzas = getAllUniquePizzas();
    $i = 0;

    if(count($pizzas) != 0){
        foreach ($pizzas as $pizza => $tab){

            $ingredients = getJSONofIngredientOnPizza($tab["idPizza"]);

            $json["data"][$i] = [
                'id'=>$tab["idPizza"],
                'name'=>$tab["nomPizza"],
                'existingOne'=>$tab["existe"],
                'ingredients'=>$ingredients["ingredient"],
                'price'=>$ingredients['price']

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }

    $json['nb'] = $i;

    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}




function getJSONofPizza($id){
    $pizza = getOnePizza($id);
    $i = 0;

    if(count($pizza) != 0){


        $ingredients = getJSONofIngredientOnPizza($pizza[0]["idPizza"]);

        $json["data"][$i] = [
            'id'=>$pizza[0]["idPizza"],
            'name'=>$pizza[0]["nomPizza"],
            'existingOne'=>$pizza[0]["existe"],
            'ingredients'=>$ingredients["ingredient"],
            'price'=>$ingredients['price']

        ];

        $i++;

        $json['error'] = 0;
        $json['nb'] = $i;


    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }

    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}

function addPizza($idPizza, $doughId, $sauceId, $toppingId, $name){

    postNewUniquePizza($idPizza, $name);
    postNewIngredientOnPizza($idPizza, $doughId);
    postNewIngredientOnPizza($idPizza, $sauceId);


    foreach ($toppingId as $value) {
        postNewIngredientOnPizza($idPizza, $value);
    }
}

function getTabOfPizzaInOrder($id){
    $pizzas = getPizzaInOrder($id);
    $i = 0;

    if(count($pizzas) != 0){
        $json['price'] = 0;
        foreach ($pizzas as $pizza => $tab){

            $ingredients = getJSONofIngredientOnPizza($tab["idPizza"]);

            $json["data"][$i] = [
                'id'=>$tab["idPizza"],
                'name'=>$tab["nomPizza"],
                'existingOne'=>$tab["existe"],
                'ingredients'=>$ingredients["ingredient"],
                'price'=>$ingredients['price']

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
            $json['price'] += $ingredients['price'];
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
        $json['nb'] = 0;
    }

    return $json;

}