<?php

require_once(realpath(__DIR__) . '/../model/orderModel.php');
require_once (realpath(__DIR__). '/pizzaController.php');
require_once (realpath(__DIR__). '/dessertController.php');
require_once (realpath(__DIR__). '/drinkController.php');

function getJSONofAllOrder(){
    $orders = getAllOrder();
    $i = 0;
    foreach ($orders as $order => $tab){
        $dessert = getTabofDessertInOrder($tab['idCommande']);
        $drink = getTabofDrinkInOrder($tab['idCommande']);
        $pizza = getTabOfPizzaInOrder($tab['idCommande']);
        $dessertAdding = Array();
        $drinkAdding = Array();
        $pizzaAdding = Array();
        $priceOrder = 0;
        //var_dump($dessert);

        if($dessert['error'] == 0){
            $dessertAdding["dessert"] = $dessert['data'];
            $dessertAdding['price'] = $dessert['price'];
            $priceOrder += $dessert['price'];
        } else {
            $dessertAdding = $dessert['text'];
        }

        //var_dump($dessertAdding);

        if($drink['error'] == 0){
            $drinkAdding["drink"] = $drink['data'];
            $drinkAdding['price'] = $drink['price'];
            $priceOrder += $drink['price'];
        } else {
            $drinkAdding = $drink['text'];
        }

        if($pizza['error'] == 0){
            $pizzaAdding['pizza'] = $pizza['data'];
            $pizzaAdding['price'] = $pizza['price'];
            $priceOrder += $pizza['price'];
        } else {
            $pizzaAdding = $pizza['text'];
        }

        $json['data'][$i] = [
            'id' => $tab['idCommande'],
            'pizzas' => $pizzaAdding,
            'desserts' => $dessertAdding,
            'drinks' => $drinkAdding,
            'idUser' => $tab['idCommande'],
            'price'=> $priceOrder
        ];

        $i++;
    }
    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


function getJSONofOrder($id){
    $order = getOneOrder($id);

        $dessert = getTabofDessertInOrder($order[0]['idCommande']);
        $drink = getTabofDrinkInOrder($order[0]['idCommande']);
        $pizza = getTabOfPizzaInOrder($order[0]['idCommande']);
        $dessertAdding = Array();
        $drinkAdding = Array();
        $pizzaAdding = Array();
        $priceOrder = 0;
        //var_dump($dessert);

        if($dessert['error'] == 0){
            $dessertAdding["dessert"] = $dessert['data'];
            $dessertAdding['price'] = $dessert['price'];
            $priceOrder += $dessert['price'];
        } else {
            $dessertAdding = $dessert['text'];
        }

        //var_dump($dessertAdding);

        if($drink['error'] == 0){
            $drinkAdding["drink"] = $drink['data'];
            $drinkAdding['price'] = $drink['price'];
            $priceOrder += $drink['price'];
        } else {
            $drinkAdding = $drink['text'];
        }

        if($pizza['error'] == 0){
            $pizzaAdding['pizza'] = $pizza['data'];
            $pizzaAdding['price'] = $pizza['price'];
            $priceOrder += $pizza['price'];
        } else {
            $pizzaAdding = $pizza['text'];
        }



        $json['data'] = [
            'id' => $order[0]['idCommande'],
            'pizzas' => $pizzaAdding,
            'desserts' => $dessertAdding,
            'drinks' => $drinkAdding,
            'idUser' => $order[0]['idCommande'],
            'price'=> $priceOrder
        ];



    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


function addEverythingInOrder($post){

    $idPizza = $post['idPizza'];
    $idOrder = $post['idOrder'];
    $idClient = $post['idClient'];
    $doughId = intval($post['dough']);
    $sauceId = intval($post['sauce']);
    $toppingId = explode(",", $post['topping']);
    $name = strtolower($post['name']);
    $dessertId = explode(",", $post['dessert']);
    $drinkId = explode(",", $post['drink']);


    addOrder($idOrder, $idClient);
    addPizza($idPizza, $doughId, $sauceId, $toppingId, $name);
    addPizzaInOrder($idOrder, $idPizza);
    addDessertInOrder($idOrder, $dessertId);
    addDrinkInOrder($idOrder, $drinkId);

    return getJSONofOrder($idOrder);

}

function addOrder($idOrder, $idClient){
    postNewOrder($idOrder, $idClient);
}

function addPizzaInOrder($idOrder, $idPizza){
    postNewPizzaInOrder($idOrder, $idPizza);
}

function addDessertInOrder($idOrder, $dessertId){
    foreach ($dessertId as $value) {

        if(is_numeric($value)){
            postNewDessertOrder($idOrder, $value);
        }

    }
}

function addDrinkInOrder($idOrder, $drinkId){
    foreach ($drinkId as $value) {

        if(is_numeric($value)){
            postNewDrinkOrder($idOrder, $value);
        }

    }
}

