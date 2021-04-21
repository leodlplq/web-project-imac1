<?php

require_once(__DIR__ . '/../model/ingredientModel.php');

function getJSONofAllIngredients(){
    $ingredients = getAllIngredients();
    $i = 0;
    if(count($ingredients) != 0){
        foreach ($ingredients as $ingredient => $tab){
            $json[$i] = [
                'id'=>$tab["idIngredient"],
                'name'=>$tab["nomIngredient"],
                'type' => $tab["typeIngredient"],
                'price'=>$tab["prixIngredient"],

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

function getJSONofOneIngredient($id){
    $ingredient = getOneIngredient($id);


    if(count($ingredient) != 0){

        $json = [
            'id'=>$ingredient[0]["idIngredient"],
            'name'=>$ingredient[0]["nomIngredient"],
            'type' => $ingredient[0]["typeIngredient"],
            'price'=>$ingredient[0]["prixIngredient"],

        ];

        $json['error'] = 0;
        $json['nb'] = 1;

    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }



    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


function addIngredient($post){
    $name = $post['name'];
    $type = $post['type'];
    $price = $post['price'];
    $url = "qsdsqdqsd";

    $types = ['topping', 'sauce', 'dough'];

    $name = strtolower($name);
    $price*=100;


    if(!count_chars($name) > 1 || !in_array($type, $types) || !is_numeric($price)){
        //error.
    } else {
        postNewIngredient($name, $type, $price, $url);

    }

}