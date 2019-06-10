<?php
require_once 'SModel.php';
require_once 'ModelUtilisateur.php';

class ModelAdmin
{
    private $id, $password, $nom, $prenom, $niveau, $IATA, $parking;


    public function __construct($id = NULL, $password = NULL, $nom = NULL, $prenom = NULL, $niveau = NULL, $IATA = NULL, $parking = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->password = $password;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->niveau = $niveau;
            $this->IATA = $IATA;
            $this->parking = $parking;
        }

    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param null $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param null $prenom
     * @return ModelAdmin
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return null
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param null $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return null
     */
    public function getIATA()
    {
        return $this->IATA;
    }

    /**
     * @param null $IATA
     */
    public function setIATA($IATA)
    {
        $this->IATA = $IATA;
    }

    /**
     * @return null
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param null $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }

    public static function chercherAdministrateur(){
        try{
            $id = $_SESSION['id'];
            $database = SModel::getInstance();
            $query="SELECT * FROM administrateur WHERE id = '$id'";
            $result = $database->query($query);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelAdmin");
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function changeCondition($table){
        try{
            $database = SModel::getInstance();
            $query = "UPDATE `emprunte` SET `TYPE` = :condition WHERE `emprunte`.`n_plaque` = :n_plaque AND `emprunte`.`emprunteur` = :emprunteur AND `emprunte`.`date_debut` = :date_debut";
            $statement = $database->prepare($query);
            $statement->execute([
                'condition' => $table['condition'],
                'n_plaque' => $table['n_plaque'],
                'emprunteur' => $table['emprunteur'],
                'date_debut' => $table['date_debut']
            ]);
            return TRUE;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function findUtilisateur($nom){
        try{
            $database = SModel::getInstance();
            $query="SELECT id,nom,prenom FROM utilisateur WHERE nom = '$nom' or prenom = '$nom'";
            $result = $database->query($query);
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }
}