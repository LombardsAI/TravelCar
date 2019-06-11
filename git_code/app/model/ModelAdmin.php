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

   public static function modifierDone_vehicule($table){
       try{
            $database = SModel::getInstance();
//       $table["capacité"] = $table["capacite"];
//       unset($table["capacite"]);
//       $table["plaque"] = $table['n_plaque'];
        $query = "UPDATE `véhicule` SET `n_plaque` = :n_plaque, `marque` = :marque, `capacité` = :capacite, `prix_emprunte` = :prix_emprunte WHERE `n_plaque` = :plaque";
       $result = $database->prepare($query);
        $result ->execute($table);
         
       return 'changedone';
       
       }catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return 'changeerror';
        }
       
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
            if($table["reservation"]=='gare'){
                $query = "UPDATE `gare` SET `TYPE` = :condition WHERE `n_plaque` = :n_plaque AND `id_client` = :id_client AND `date_debut` = :date_debut";
            $statement = $database->prepare($query);
            $statement->execute([
                'condition' => $table['condition'],
                'n_plaque' => $table['n_plaque'],
                'id_client' => $table['emprunteur'],
                'date_debut' => $table['date_debut']
            ]);
                
            }
         else{
                $query = "UPDATE `emprunte` SET `TYPE` = :condition WHERE `emprunte`.`n_plaque` = :n_plaque AND `emprunte`.`emprunteur` = :emprunteur AND `emprunte`.`date_debut` = :date_debut";
                        $statement = $database->prepare($query);
            $statement->execute([
                'condition' => $table['condition'],
                'n_plaque' => $table['n_plaque'],
                'emprunteur' => $table['emprunteur'],
                'date_debut' => $table['date_debut']
            ]);
                
         }
            

            return 'changedone';
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return 'changeerror';
        }
    }
    
    public static function changePlace($table){
          try{
            $database = SModel::getInstance();
             $query = "UPDATE `gare` SET `n_place` = :n_place WHERE `n_plaque` = :n_plaque AND `id_client` = :id_client AND `date_debut` = :date_debut";
              $statement = $database->prepare($query);
            $statement->execute([
                'n_place' => $table['n_place'],
                'n_plaque' => $table['n_plaque'],
                'id_client' => $table['emprunteur'],
                'date_debut' => $table['date_debut']
            ]);
            
             return 'changedone';
          }catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return 'changeerror';
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

    public static function findVoiture($plaque){
        try{
            $database = SModel::getInstance();
            $query="SELECT * FROM véhicule WHERE n_plaque = '$plaque'";
            $result = $database->query($query);
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function addVoiture($table)
    {
        try {
            $database = SModel::getInstance();
            $query = "INSERT INTO `parking` (`label`, `aeroport`, `prix_par_heure`, `adresse`, `nombre_max`) VALUES (:label, :aeroport, :prix_par_heure, :adresse, :nombre_max)";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $table['Label'],
                'aeroport' => $table['Aeroport'],
                'prix_par_heure' => $table['Prix'],
                'adresse' => $table['Adresse'],
                'nombre_max' => $table['Nombre']
            ]);
            return 'adddone';
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return 'adderror';
        }
    }
}