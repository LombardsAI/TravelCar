<?php
require_once ('../model/ModelReservation.php');
require_once ('../model/ModelReservationVehicule.php');
class controllerReservation
{
    public static function reserverParking(){
        $check = "parking";
        require ('../view/viewReserver_parking.php');
    }

    public static function reserverParkingDetail($table){
        $arr_debut = explode("/", $table["date_debut"]);
        $arr_debut_1 = array($arr_debut[2],$arr_debut[0],$arr_debut[1]);
        $arr_fin = explode("/", $table["date_fin"]);
        $arr_fin_1 = array($arr_fin[2],$arr_fin[0],$arr_fin[1]);
         $table["date_debut"] = implode("-", $arr_debut_1);
         $table["date_fin"] = implode("-", $arr_fin_1);
        $table["date_debut"].=" ".$table["time_debut"].":00";
        $table["date_fin"].=" ".$table["time_fin"].":00";
        $info = array();
        $info["aeroport"] = $table["aeroport"];
        $info["date_debut"] = $table["date_debut"];
        $info["date_fin"] = $table["date_fin"];
        $results = ModelReservation::reserver_search($info);
        require ('../view/viewReserver_parking_result.php');
    }
    public static function add_gare($table){
        $results = ModelReservation::add_gare($table);
       
        if($results){
            require ('../view/transition_success.php');
        }
        else{
            require ('../view/transition_fail.php');
        }
   }
   
   public static function reserverVehicule(){
        $check = "vehicule";
         require ('../view/viewReserver_parking.php');
   }
   
   public static function reserverVehiculeDetail($table){
         $arr_debut = explode("/", $table["date_debut"]);
        $arr_debut_1 = array($arr_debut[2],$arr_debut[0],$arr_debut[1]);
        $arr_fin = explode("/", $table["date_fin"]);
        $arr_fin_1 = array($arr_fin[2],$arr_fin[0],$arr_fin[1]);
         $table["date_debut"] = implode("-", $arr_debut_1);
         $table["date_fin"] = implode("-", $arr_fin_1);
        $table["date_debut"].=" ".$table["time_debut"].":00";
        $table["date_fin"].=" ".$table["time_fin"].":00";
        $info = array();
        $info["aeroport"] = $table["aeroport"];
        $info["date_debut"] = $table["date_debut"];
        $info["date_fin"] = $table["date_fin"];
        $results = ModelReservationVehicule::reserver_search_vehicule($info);
        require ('../view/viewReserver_vehicule_result.php');
   }
}