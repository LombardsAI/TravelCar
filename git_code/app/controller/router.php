<?php

include '../model/config.php';
require_once 'controllerUtilisateur.php';
require_once 'controllerReservation.php';
//require_once 'ControllerProducteur.php';

$parametres = "";
// récupération de l'action passée dans l'URL
if($_POST == []) {
    $query_string = $_SERVER['QUERY_STRING'];
    // fonction parse_str permet de construire une table de hachage (clé + valeur)
    parse_str($query_string, $param);
// $action contient le nom de la méthode statique recherchée
    $action = $param["action"];
    $controlleur =  $param["controlleur"];
    unset($param["action"]);
    unset( $param["controlleur"]);
    $parametres=$param;
}
else {
    $action = $_POST["action"];
    $controlleur =  $_POST["controlleur"];
    unset($_POST["action"]);
    unset($_POST["controlleur"]);
    $parametres = $_POST;
}
if($controlleur == 'utilisateur'){
    $controlleurchoisi = controllerUtilisateur::class;
}
else if($controlleur == 'reservation'){
    $controlleurchoisi = controllerReservation::class;
}

switch ($action) {
    case "accueil" :
    case "signUp" :
    case "signUpDone" :
    case "checkExistance" :
    case "checkAccount" :

    case "modifierUtilisateur" :
    case "modifierDone" :
    case "reserverParking" :
    case "reserverParkingDetail" :
    case "add_gare":
          case "add_gare":
    case "reserverVehicule":
    case "reserverVehiculeDetail":
        case "add_emprunte":

        break;

    default:
        $action = "signIn";
        $controlleurchoisi = controllerUtilisateur::class;
}


//echo ("Router : nom = $nom");
// appel de la méthode statique $action de ControllerVin2
if($parametres == NULL){
    $controlleurchoisi::$action();
}
else {
    $controlleurchoisi::$action($parametres);
}







