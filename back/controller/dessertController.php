<?php

require_once(__DIR__ . '/../model/dessertModel.php');

function getJSONofAllDesserts(){
    $desserts = getAllDesserts();
    $i = 0;
    if(count($desserts) != 0){
        foreach ($desserts as $drink => $tab){
            $json[$i] = [
                'id'=>$tab["idDessert"],
                'name'=>$tab["nomDessert"],
                'price'=>$tab["prixDessert"],

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



function getJSONofOneDessert($id){
    $dessert = getOneDessert($id);


    if(count($dessert) != 0){

        $json = [
            'id'=>$dessert[0]["idDessert"],
            'name'=>$dessert[0]["nomDessert"],
            'price'=>$dessert[0]["prixDessert"],

        ];

        $json["error"] = 0;
        $json["nb"] = 1;
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
    }


    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


function addDessert($post){
    $name = $post['name'];
    $price = $post['price'];
    $url = "qsdsqdqsd";

    $name = strtolower($name);
    $price*=100;


    if(!count_chars($name) > 1 || !is_numeric($price)){
        //error.
    } else {
        postNewDessert($name, $price, $url);

    }

}
