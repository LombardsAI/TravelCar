<?php

include '../model/config.php';
require_once 'controllerUtilisateur.php';
require_once 'controllerReservation.php';
//require_once 'ControllerProducteur.php';

// récupération de l'action passée dans l'URL
if($_POST == []) {
    $query_string = $_SERVER['QUERY_STRING'];
    // fonction parse_str permet de construire une table de hachage (clé + valeur)
    parse_str($query_string, $param);
// $action contient le nom de la méthode statique recherchée
    $action = $param["action"];
    $param1 = $param["param1"];
    $param2 = $param["param2"];
    $param3 = $param["param3"];
    $param4 = $param["param4"];
    $param5 = $param["param5"];
    $controlleur = $param["controlleur"];
}
else {
    $action = $_POST["action"];
    $param1 = $_POST["param1"];
    $param2 = $_POST["param2"];
    $param3 = $_POST["param3"];
    $param4 = $_POST["param4"];
    $param5 = $_POST["param5"];
    $controlleur = $_POST["controlleur"];
}

if($controlleur == 'utilisateur'){
    $controlleurchoisi = controllerUtilisateur::class;
}
else if($controlleur == 'reservation'){
    $controlleurchoisi = controllerReservation::class;
}
//else if($controlleur == 'producteur'){
//    $controlleurchoisi = ControllerProducteur::class;
//}

switch ($action) {
    case "accueil" :
    case "signUp" :
    case "signUpDone" :
    case "checkExistance" :
    case "checkAccount" :
    case "reserverParking" :
    case "reserverParkingDetail" :
        break;

    default:
        $action = "signIn";
        $controlleurchoisi = controllerUtilisateur::class;
}


//echo ("Router : nom = $nom");
// appel de la méthode statique $action de ControllerVin2
if($param1 == NULL)
    $controlleurchoisi::$action();
else {
    if($param2 == NULL)
         $controlleurchoisi::$action($param1);
    else{
        if($param3 == NULL)
             $controlleurchoisi::$action($param1,$param2);
        else{
            if($param4 == NULL)
                $controlleurchoisi::$action($param1,$param2,$param3);
            else{
                if($param5 == NULL)
                    $controlleurchoisi::$action($param1,$param2,$param3,$param4);
                else{
                    $controlleurchoisi::$action($param1,$param2,$param3,$param4,$param5);
                }
            }
        }

    }
}



