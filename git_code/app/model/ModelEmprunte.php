<?php
require_once 'SModel.php';

class ModelEmprunte
{
    private $n_plaque, $emprunteur, $label_du_parking, $date_debut, $date_fin, $TYPE, $cout;

    public function __construct($n_plaque = NULL, $emprunteur = NULL, $label_du_parking = NULL, $date_debut = NULL, $date_fin = NULL, $TYPE = NULL, $cout = NULL)
    {
        if (!is_null($n_plaque)) {
            $this->n_plaque = $n_plaque;
            $this->emprunteur = $emprunteur;
            $this->label_du_parking = $label_du_parking;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->TYPE = $TYPE;
            $this->cout = $cout;
        }

    }
    /**
     * @return mixed
     */
    public function getNPlaque()
    {
        return $this->n_plaque;
    }

    /**
     * @param mixed $n_plaque
     */
    public function setNPlaque($n_plaque)
    {
        $this->n_plaque = $n_plaque;
    }

    /**
     * @return mixed
     */
    public function getEmprunteur()
    {
        return $this->emprunteur;
    }

    /**
     * @param mixed $emprunteur
     */
    public function setEmprunteur($emprunteur)
    {
        $this->emprunteur = $emprunteur;
    }

    /**
     * @return mixed
     */
    public function getLabelDuParking()
    {
        return $this->label_du_parking;
    }

    /**
     * @param mixed $label_du_parking
     */
    public function setLabelDuParking($label_du_parking)
    {
        $this->label_du_parking = $label_du_parking;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return mixed
     */
    public function getTYPE()
    {
        return $this->TYPE;
    }

    /**
     * @param mixed $TYPE
     */
    public function setTYPE($TYPE)
    {
        $this->TYPE = $TYPE;
    }

    /**
     * @return mixed
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param mixed $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }

    public static function chercherReservation($query){
        try{
            $database = SModel::getInstance();
            $result = $database->query($query);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelEmprunte");
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

}