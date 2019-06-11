<?php
require_once '../model/ModelAdmin.php';
require_once '../model/ModelEmprunte.php';
require_once '../model/ModelVehicule.php';

class controllerAdmin
{
    public static function accueilAdmin(){
        require '../view/viewAccueil_admin.php';
    }

    public static function voirReservationEmprunte(){
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
        require '../view/viewVoir_reservation_emprunte.php';
    }
    
     public static function voirReservationParking(){
        $results = ModelAdmin::chercherAdministrateur();
        foreach($results as $mv){
            if($mv->getNiveau()==1){
                $parking = $mv->getParking();
                $query="SELECT * FROM gare where label_du_parking = '$parking' ORDER BY date_debut";
         }
            else if($mv->getNiveau()==2){
                $IATA = $mv->getIATA();
                $query="SELECT * FROM gare where EXISTS (SELECT label from parking where parking.aeroport = '$IATA' and emprunte.label_du_parking = parking.label) ORDER BY date_debut";
            }
            else if($mv->getNiveau()==3){
                $query="SELECT * FROM gare ORDER BY date_debut";
            }
        }
        $reservation = ModelEmprunte::chercherReservationParking($query);
        require '../view/viewVoir_reservation_parking.php';
    }
    

    public static function infoUtilisateur($table){
        $results = ModelUtilisateur::chercherUtilisateur($table['utilisateur']);
        $resultsParking = ModelUtilisateur::histoireParking($table['utilisateur'],'emprunteur');
        $resultsEmprunte = ModelUtilisateur::histoireEmprunte($table['utilisateur'],'emprunteur');
        $resultsPret = ModelUtilisateur::histoirePret($table['utilisateur']);
        require_once '../view/viewInfoUtilisateur.php';
    }
    public static function infoVehicule($table){
       $results = ModelVehicule::chercherVehicule($table["n_plaque"]); 
       require_once '../view/viewInfoVehicule.php';
       
    }
    
    public static function modifierDone_vehicule($table){
        $results = ModelAdmin:: modifierDone_vehicule($table);
        if($results){
          echo "<script type='text/javascript'>alert('success')</script>";
            
        }
        else{
            echo "<script type='text/javascript'>alert('fail')</script>";

        }
      echo "<script type='text/javascript'>";
      echo "window.location.href = 'router.php?action=voirReservationParking&controlleur=administrateur'";
      echo"</script>";
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
        if($table['type'] == 'voiture'){
            $results = ModelAdmin::findVoiture($table['contenu']);
            $resultsParking = ModelUtilisateur::histoireParking($table['contenu'],'voiture');
            $resultsEmprunte = ModelUtilisateur::histoireEmprunte($table['contenu'],'voitures');
            require_once ('../view/viewAdmin_findVoiture.php');
        }
    }

    public static function ajouteParking(){
        require_once '../view/viewAjoute_parking.php';
    }

    public static function ajouteParkingResult($table){
        $results = ModelAdmin::addVoiture($table);
        require_once '../view/viewChange_condition_result.php';
    }

    public static function modifierDone_vehicule($table){
        $results = ModelVehicule::modifierVehicule($table);
        require_once '../view/viewChange_condition_result.php';
    }

}