<?php
require_once ('../model/ModelReservation.php');

class controllerReservation
{
    public static function reserverParking(){
        require ('../view/viewReserver_parking.php');
    }

    public static function reserverParkingDetail($table){
        $table["date_debut"].=" ".$table["time_debut"].":00";
        $table["date_fin"].=" ".$table["time_fin"].":00";
        $info = array();
        $info["aeroport"] = $table["aeroport"];
        $info["time_debut"] = $table["date_debut"];
        $info["time_fin"] = $table["date_fin"];
        $results = ModelReservation::reserver_search($info);
        require ('../view/viewReserver_parking_result.php');
    }
}