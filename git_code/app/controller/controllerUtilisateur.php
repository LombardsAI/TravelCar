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
    public static function signUpDone() {
        // ajouter une validation des informations du formulaire
        $results = ModelUtilisateur::insert ($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['password'], $_POST['mail']);
        require '../view/viewSign_upResult.php';
    }

    public static function checkAccount($id,$pw){
        ModelUtilisateur::checkAccount($id,$pw);
    }

    public static function checkExistance($id){
        ModelUtilisateur::checkExistance($id);
    }
}