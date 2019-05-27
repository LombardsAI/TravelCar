<?php
require_once ('../model/ModelReservation.php');

class controllerReservation
{
    public static function reserverParking(){
        require ('../view/viewReserver_parking.php');
    }

    public static function reserverParkingDetail($lieu,$date_debut,$time_debut,$date_fin,$time_fin){
        $date_debut.=" ".$time_debut.":00";
        $date_fin.=" ".$time_fin.":00";
        $info = array();
        $info["aeroport"] = $lieu;
        $info["time_debut"] = $date_debut;
        $info["time_fin"] = $date_fin;
        $results = ModelReservation::reserver_search($info);
        require ('../view/viewReserver_parking_result.php');
    }
}