<?php
require_once 'SModel.php';


class ModelReservation
{

    private $aeroport, $label, $prix, $adresse;

    public function __construct($aeroport, $label, $prix, $adresse)
    {
        $this->aeroport = $aeroport;
        $this->label = $label;
        $this->prix = $prix;
        $this->adresse = $adresse;
    }


    public static function reserver_search($info)
    {
        try {
            $database = SModel::getInstance();
                $sql = "SELECT aeroport, p.label, prix_du_jour, adresse FROM parking p, "
                    . "(SELECT count(*) as num, label_du_parking as label FROM gare g WHERE "
                    . "unix_timestamp(g.date_debut) < unix_timestamp('" . $info["time_debut"] . "') OR "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
                    . "unix_timestamp(g.date_fin) > unix_timestamp('" . $info["time_fin"] . "') GROUP BY label_du_parking)a WHERE "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
                    . "(p.aeroport ='" . $info["aeroport"] . "'AND"
//        . " p.aeroport ='CDG' AND"
                    . " p.label = a.label AND "
                    . " p.nombre_max > a.num) OR (p.label NOT IN (a.label))";
            $result = $database -> query($sql);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelReservation");
            return $list;

        } catch (PDOException $e) {
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