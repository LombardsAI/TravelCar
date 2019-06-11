<?php
require_once 'SModel.php';

class ModelVehicule
{

private $n_plaque,$marque,$capacité,$prix_emprunte;
    public function __construct($n_plaque = NULL, $marque = NULL, $capacité = NULL, $prix_emprunte = NULL)
    {
        if(!is_null($n_plaque)) {
            $this->n_plaque = $n_plaque;
            $this->marque = $marque;
            $this->capacité = $capacité;
            $this->prix_emprunte = $prix_emprunte;
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
     * @param mixed $n_palque
     */

    public function setNPlaque($n_plaque)
    {
        $this->n_plaque = $n_plaque;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getCapacité()
    {
        return $this->capacité;
    }

    /**
     * @param mixed $capacité
     */
    public function setCapacité($capacité)
    {
        $this->capacité = $capacité;
    }

    /**
     * @return mixed
     */
    public function getPrixEmprunte()
    {
        return $this->prix_emprunte;
    }

    /**
     * @param mixed $prix_emprunte
     */
    public function setPrixEmprunte($prix_emprunte)
    {
        $this->prix_emprunte = $prix_emprunte;
    }


    public static function chercherVehicule($n_plaque){
        try{
            $database = SModel::getInstance();
            $sql = "SELECT * FROM véhicule WHERE n_plaque='$n_plaque'";

            $result = $database -> query($sql);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelVehicule");
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }
}