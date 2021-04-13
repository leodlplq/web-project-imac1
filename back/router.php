<?php

//getting information to do the router.
$method = $_SERVER['REQUEST_METHOD'];
$url = explode('/', $_SERVER['REQUEST_URI']);

//var_dump($url); //some testing.

switch($url[3]){

    case 'ingredients':

        switch ($method) {
            case 'GET':
                //give all the ingredients from the db

                break;

            case 'POST':
                //
                break;

            default:
                # code...
                break;
        }
        break;
}




?>