<?php
require_once '../model/ModelAdmin.php';
require_once '../model/ModelEmprunte.php';

class controllerAdmin
{
    public static function accueilAdmin(){
        require '../view/viewAccueil_admin.php';
    }

    public static function voirReservation(){
        $results = ModelAdmin::chercherAdministrateur();
        foreach($results as $mv){
            if($mv->getNiveau()==1){
                $parking = $mv->getParking();
                $query="SELECT * FROM emprunte where label_du_parking = '$parking' ORDER BY date_debut";
         }
            else if($mv->getNiveau()==2){
                $IATA = $mv->getIATA();
                $query="SELECT * FROM emprunte where EXISTS (SELECT label from parking where parking.aeroport = '$IATA' and emprunte.label_du_parking = parking.label) ORDER BY date_debut";
            }
            else if($mv->getNiveau()==3){
                $query="SELECT * FROM emprunte ORDER BY date_debut";
            }
        }
        $reservation = ModelEmprunte::chercherReservation($query);
        require '../view/viewVoir_reservation.php';
    }

    public static function infoUtilisateur($table){
        $results = ModelUtilisateur::chercherUtilisateur($table['utilisateur']);
        $resultsParking = ModelUtilisateur::histoireParking($table['utilisateur']);
        $resultsEmprunte = ModelUtilisateur::histoireEmprunte($table['utilisateur']);
        $resultsPret = ModelUtilisateur::histoirePret($table['utilisateur']);
        require_once '../view/viewInfoUtilisateur.php';
    }

    public static function changeCondition($table){
        $param = $table;
        require_once('../view/viewChange_condition.php');
    }

    public static function conditionChanged($table){
        $results = ModelAdmin::changeCondition($table);
        require_once('../view/viewChange_condition_result.php');
    }

    public static function find(){
        require_once ('../view/viewAdmin_find.php');
    }

    public static function findResult($table){
        if($table['type'] == 'utilisateur'){
            $results = ModelAdmin::findUtilisateur($table['contenu']);
            require_once ('../view/viewAdmin_findUtilisateur.php');
        }
    }
}