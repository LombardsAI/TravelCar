<?php
require_once '../model/ModelUtilisateur.php';

class controllerUtilisateur
{
    public static function accueil(){
        require('../view/viewAccueil.php');
    }

    public static function signIn() {
        require('../view/viewSign_in.php');
    }

    // Affiche le formulaire de creation d'un utilisateur
    public static function signUp() {
        require('../view/viewSign_up.php');
    }

    // Ajout des données d'un nouveau utilisateur et affiche un message de confirmation
    public static function signUpDone($table) {
        // ajouter une validation des informations du formulaire
        $results = ModelUtilisateur::insert ($table);
        require '../view/viewSign_upResult.php';
    }

    public static function checkAccount($table){
        ModelUtilisateur::checkAccount($table);
    }

    public static function checkExistance($table){
        ModelUtilisateur::checkExistance($table);
    }


    public static function modifierUtilisateur(){
        $results = ModelUtilisateur::chercherUtilisateur();
        require '../view/viewModify_utilisateur.php';
    }

    public static function modifierDone($table){
        $results = ModelUtilisateur::modifyUtilisateur($table);
        require '../view/viewSign_upResult.php';
    }
   public static function histoireParking(){
       $results = ModelUtilisateur::histoireParking();
       require '../view/viewHisoireParking.php';
   }
   
    public static function histoireEmprunte(){
       $results = ModelUtilisateur::histoireEmprunte();
       require '../view/viewHistoireEmprunte.php';
   }
   public static function histoirePret(){
       $results = ModelUtilisateur::histoirePret();
       require '../view/viewHistoirePret.php';
   }

}
