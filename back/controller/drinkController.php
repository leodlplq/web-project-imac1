<?php

require_once(__DIR__ . '/../model/drinkModel.php');
require_once(__DIR__ . '/../toolkit.php');

function getJSONofAllDrinks(){
    $drinks = getAllDrinks();
    $i = 0;
    if(count($drinks) != 0){
        foreach ($drinks as $drink => $tab){
            $json["data"][$i] = [
                'id'=>$tab["idBoisson"],
                'name'=>$tab["nomBoisson"],
                'price'=>$tab["prixBoisson"],
                'url'=>$tab["urlImageBoisson"]

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['nb'] = 0;
        $json['error'] = 1;
    }



    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}



function getJSONofOneDrink($id){
    $drink = getOneDrink($id);


    if(count($drink) != 0){

        $json["data"] = [
            'id'=>$drink[0]["idBoisson"],
            'name'=>$drink[0]["nomBoisson"],
            'price'=>$drink[0]["prixBoisson"],
            'url'=>$drink[0]["urlImageBoisson"]

        ];

        $json["error"] = 0;
        $json["nb"] = 1;
    } else {
        $json['text'] = "Nothing was found...";
        $json["nb"] = 0;
        $json['error'] = 1;
    }


    return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function addDrink($post){
    $name = $post['name'];
    $price = $post['price'];

    $uploaddir = get_absolute_path(__DIR__ . '/../../assets/images/upload/');

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir."/".$newfilename)) {


        $name = strtolower($name);
        $price*=100;


        if(!count_chars($name) > 1 || !is_numeric($price)){
            //header('Location:');
            $url = root()."/admin/admin.php?e-add=1";
            header("Location: $url");
        } else {
            return postNewDrink($name, $price, $newfilename);

        }
    } else {

        var_dump($_FILES);
        //error due to image.
        //header('Location:/admin/admin.php?e-image=1');
    }

}

function updateDrink($post, $id){

    $name = strtolower($post['newName']);
    $price = $post['newPrice'] * 100;
    $changeImage =  $post['newImage'];
    $urlImage = null;


    if($changeImage == "true"){

        $uploaddir = get_absolute_path(__DIR__ . '/../../assets/images/upload/');

        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $urlImage = $newfilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir."/".$newfilename)) {

            if(!count_chars($name) > 1 || !is_numeric($price)){
                //error.
                $url = root()."/admin/admin.php?e-form=1";
                header("Location: $url");

            } else {
                return changeDrinkInDB($name, $price, $urlImage, $id);

            }
        } else {


            //error due to image.
            $url = root()."/admin/admin.php?e-image=1";
            header("Location: $url");

        }
    } else {
        return changeDrinkInDB($name, $price, $urlImage, $id);
    }

}


function deleteDrink($id){
    return deleteDrinkFromDB($id);
}

function getTabofDrinkInOrder($id){
    $drinks = getDrinkOfOrder($id);
    $i = 0;

    if(count($drinks) != 0){
        $json['price'] = 0;
        foreach ($drinks as $drink => $tab){
            $json["data"][$i] = [
                'id'=>$tab["idBoisson"],
                'name'=>$tab["nomBoisson"],
                'price'=>intval($tab["prixBoisson"]),
                'url'=>$tab["urlImageBoisson"]

            ];

            $i++;

            $json['error'] = 0;
            $json['nb'] = $i;
            $json['price'] += intval($tab["prixBoisson"]);
        }
    } else {
        $json['text'] = "Nothing was found...";
        $json['error'] = 1;
        $json['nb'] = 0;
    }
    return $json;
}
