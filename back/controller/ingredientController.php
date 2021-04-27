<?php

require_once(__DIR__ . '/../model/ingredientModel.php');
require_once(__DIR__ . '/../toolkit.php');

function getJSONofAllIngredients(){
    $ingredients = getAllIngredients();
    $i = 0;
    if(count($ingredients) != 0){
        foreach ($ingredients as $ingredient => $tab){
            $json["data"][$i] = [
                'id'=>$tab["idIngredient"],
                'name'=>$tab["nomIngredient"],
                'type' => $tab["typeIngredient"],
                'price'=>$tab["prixIngredient"],
                'url'=>$tab["urlImageIngredient"]

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

        $json["data"] = [
            'id'=>$ingredient[0]["idIngredient"],
            'name'=>$ingredient[0]["nomIngredient"],
            'type' => $ingredient[0]["typeIngredient"],
            'price'=>$ingredient[0]["prixIngredient"],
            'url'=>$ingredient[0]["urlImageIngredient"]

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

    $types = ['topping', 'sauce', 'dough'];
    $uploaddir = get_absolute_path(__DIR__ . '/../../assets/images/upload/');

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);



    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir."/".$newfilename)) {


        $name = strtolower($name);
        $price*=100;


        if(!count_chars($name) > 1 || !in_array($type, $types) || !is_numeric($price)){
            //error due to name, type or price.
        } else {
           return postNewIngredient($name, $type, $price, $newfilename);

        }
    } else {
        //error due to image.
        header('Location:/admin/admin.php?e-image=1');
    }


};

function updateIngredient($post, $id){

    $name = strtolower($post['newName']);
    $price = $post['newPrice'] * 100;
    $type = $post['newType'];
    $changeImage =  $post['newImage'];
    $urlImage = null;
    //var_dump($changeImage);
    if($changeImage == "true"){

        $uploaddir = get_absolute_path(__DIR__ . '/../../assets/images/upload/');

        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $urlImage = $newfilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir."/".$newfilename)) {


            if(!count_chars($name) > 1 || !is_numeric($price)){
                //error.
                header('Location:/admin/admin.php?e-form=1');
            } else {
                return changeIngredientInDB($name,$type,  $price, $urlImage, $id);

            }
        } else {


            //error due to image.

            //header('Location:/admin/admin.php?e-image=1');
        }
    } else {
        return changeIngredientInDB($name,$type,  $price, $urlImage, $id);
    }

}


function deleteIngredient($id){
    return deleteIngredientFromDB($id);
}


