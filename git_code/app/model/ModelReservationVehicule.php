<?php
require_once 'SModel.php';


class ModelReservationVehicule
{

    private $marque,$capacite,$prix,$aeroport, $label, $adresse;

 public function __construct($marque=NULL,$capacite=NULL,$prix=NULL,$n_plaque=NULL, $label=NULL, $adresse=NULL)
    {
        if(!is_null($marque)){
        $this->marque = $marque;    
        $this->capacite = $capacite;
        $this->prix = $prix;
        $this->label = $label;
        $this->adresse = $adresse;
        $this->n_plaque = $n_plaque;
    }

    }

    public static function reserver_search_vehicule($info){
        
          try {
          $database = SModel::getInstance();
          $sql = "SELECT  p.label, adresse,v.marque,v.capacité as capacite, v.prix_emprunte as prix,v.n_plaque FROM parking p,véhicule v, "
        . "(SELECT label_du_parking as label,n_plaque FROM gare g WHERE "
       . "unix_timestamp(g.date_debut) < unix_timestamp('" .$info["date_debut"] ."') AND "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
        . "unix_timestamp(g.date_fin) > unix_timestamp('" .$info["date_fin"]."') AND g.TYPE = 1)a WHERE "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
        . "p.aeroport ='" .$info["aeroport"] ."' AND "
        . " p.label = a.label AND v.n_plaque = a.n_plaque AND "
        . " NOT EXISTS (SELECT e.n_plaque FROM emprunte e "
        . "WHERE (unix_timestamp(e.date_debut) > unix_timestamp('" .$info["date_debut"] ."') AND  "
        . "unix_timestamp(e.date_debut) < unix_timestamp('" .$info["date_fin"] ."')) OR "
          . " (unix_timestamp(e.date_fin) > unix_timestamp('" .$info["date_debut"] ."') AND  "
        . "unix_timestamp(e.date_fin) < unix_timestamp('" .$info["date_fin"] ."')) AND e.TYPE = 1"
         . ")";
//          echo $sql;
           $result = $database -> query($sql);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelReservationVehicule");
            return $list;
          }
          catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }
    
    
public static function add_emprunte($info){
     try {
          $database = SModel::getInstance();
           //inserer un nouveau enregistrement.
            $cle = '';
            $valeur = '';
            unset($info["aeroport"]);
            $time_debut = $info["date_debut"];
            $time_fin = $info["date_fin"];
            foreach($info as $key=>$value){
                $cle.=$key.',';
                $valeur.="'".$value."',";
            }
          $sql = "INSERT INTO emprunte ("
                  . $cle."emprunteur) VALUES ("
                  . $valeur."'".$_COOKIE["id"]."')";
           $database -> query($sql);
           return true;
     }catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
}


 public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $aeroport
     */
    public function setCapacite($capacite)
    {
        $this->aeroport = $capacite;
    }
     public function getMarque()
    {
        return $this->marque;
    }
     public function getPlaque()
    {
        return $this->n_plaque;
    }   
}


