<?php

require_once(__DIR__ . '/../model/drinkModel.php');

function getJSONofAllDrinks(){
    $drinks = getAllDrinks();
    $i = 0;
    if(count($drinks) != 0){
        foreach ($drinks as $drink => $tab){
            $json[$i] = [
                'id'=>$tab["idBoisson"],
                'name'=>$tab["nomBoisson"],
                'price'=>$tab["prixBoisson"],

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }



    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}



function getJSONofOneDrink($id){
    $drink = getOneDrink($id);


    if(count($drink) != 0){

        $json = [
            'id'=>$drink[0]["idBoisson"],
            'name'=>$drink[0]["nomBoisson"],
            'price'=>$drink[0]["prixBoisson"],

        ];

        $json["error"] = 0;
        $json["nb"] = 1;
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }


    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function addDrink($post){
    $name = $post['name'];
    $price = $post['price'];
    $url = "qsdsqdqsd";

    $name = strtolower($name);
    $price*=100;


    if(!count_chars($name) > 1 || !is_numeric($price)){
        //error.
    } else {
        postNewDrink($name, $price, $url);

    }

}
