<?php
require_once 'SModel.php';


class ModelReservation
{

    private $aeroport, $label, $prix, $adresse;

    public function __construct($aeroport=NULL, $label=NULL, $prix=NULL, $adresse=NULL)
    {
        if(!is_null($aeroport)){
        $this->aeroport = $aeroport;
        $this->label = $label;
        $this->prix = $prix;
        $this->adresse = $adresse;
    }

    }
    public static function reserver_search($info)
    {
        try {
            $database = SModel::getInstance();
                $sql = "SELECT aeroport, p.label, prix_du_jour as prix, adresse FROM parking p LEFT JOIN"
                    . "(SELECT count(*) as num, label_du_parking as label FROM gare g WHERE "
                    . "(unix_timestamp(g.date_debut) > unix_timestamp('" . $info["date_debut"] . "') AND "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
                    . "unix_timestamp(g.date_debut) < unix_timestamp('" . $info["date_fin"] . "') ) OR "
                     . "(unix_timestamp(g.date_fin) > unix_timestamp('" . $info["date_debut"] . "') AND "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
                    . "unix_timestamp(g.date_fin) < unix_timestamp('" . $info["date_fin"] . "') )"
                        . "AND g.TYPE !=-1 AND g.TYPE !=-2 "
                        . "GROUP BY label_du_parking)a ON "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
                    . "(p.aeroport ='" . $info["aeroport"] . "'AND"
//        . " p.aeroport ='CDG' AND"
                    . " p.label = a.label AND "
                    . " p.nombre_max > a.num) OR (p.label NOT IN (a.label))";
//             $sql = "SELECT aeroport, label, prix_du_jour, adresse FROM parking";
            $result = $database -> query($sql);
//            $result -> execute();
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelReservation");
            return $list;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }

    }
    
    public static function add_gare($info){
         try {
            $database = SModel::getInstance();
            $sql = "insert ignore into véhicule (n_plaque) values ('"
                    . $info["n_plaque"]."')";
            $database -> query($sql); 
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
         $sql = "INSERT INTO gare ("
                 . $cle."id_client) VALUES ("
                 . $valeur."'".$_COOKIE["id"]."')";
               $database -> query($sql);
               return TRUE;
         }catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    /**
     * @return mixed
     */
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
    public function getAeroport()
    {
        return $this->aeroport;
    }

    /**
     * @param mixed $aeroport
     */
    public function setAeroport($aeroport)
    {
        $this->aeroport = $aeroport;
    }
}