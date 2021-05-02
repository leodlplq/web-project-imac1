<?php

require_once(__DIR__ . '/../model/dessertModel.php');

function getJSONofAllDesserts(){
    $desserts = getAllDesserts();
    $i = 0;
    if(count($desserts) != 0){
        foreach ($desserts as $drink => $tab){
            $json["data"][$i] = [
                'id'=>$tab["idDessert"],
                'name'=>$tab["nomDessert"],
                'price'=>$tab["prixDessert"],
                'url'=>$tab["urlImageDessert"]

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

        $json["data"] = [
            'id'=>$dessert[0]["idDessert"],
            'name'=>$dessert[0]["nomDessert"],
            'price'=>$dessert[0]["prixDessert"],
            'url'=>$dessert[0]["urlImageDessert"]

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

    $name = strtolower($name);
    $price*=100;

    $uploaddir = get_absolute_path(__DIR__ . '/../../assets/images/upload/');

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir."/".$newfilename)) {


        $name = strtolower($name);
        $price*=100;


        if(!count_chars($name) > 1 || !is_numeric($price)){
            //error.
            $url = root()."/admin/admin.php?e-form=1";
            header("Location: $url");

        } else {
            return postNewDessert($name, $price, $newfilename);

        }
    } else {


        //error due to image.
        $url = root()."/admin/admin.php?e-image=1";
        header("Location: $url");

    }



}


function updateDessert($post, $id){

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
                return changeDessertInDB($name, $price, $urlImage, $id);

            }
        } else {


            //error due to image.
            $url = root()."/admin/admin.php?e-image=1";
            header("Location: $url");

        }
    } else {
        return changeDessertInDB($name, $price, $urlImage, $id);
    }

}


function deleteDessert($id){
    return deleteDessertFromDB($id);
}