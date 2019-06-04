<?php
require_once 'SModel.php';

class ModelUtilisateur
{
    private $id, $nom, $prenom, $telephone, $password, $ad_mail;



    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $telephone = NULL, $password = NULL, $ad_mail = NULL)
    {
        if(!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->telephone = $telephone;
            $this->password = $password;
            $this->ad_mail = $ad_mail;
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
     * @return null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param null $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAdMail()
    {
        return $this->ad_mail;
    }

    /**
     * @param mixed $ad_mail
     */
    public function setAdMail($ad_mail)
    {
        $this->ad_mail = $ad_mail;
    }

    public static function insert($table) {
        try {
            $database = SModel::getInstance();
            $query = "insert into utilisateur value (:id, :nom, :prenom, :telephone, :password, :ad_mail)";
            $statement = $database->prepare($query);
            $statement->execute($table);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function checkAccount($table){
        try{

            $database = SModel::getInstance();
//            $query="SELECT * FROM utilisateur WHERE id = '$id' and password = '$pw'";
             $query="SELECT * FROM utilisateur WHERE ";
             foreach($table as $key=>$value){
                $query.=$key."='".$value."' AND "; 
             }
             $query = substr($query,0,strlen($query)-4);
            $result = $database->query($query);
            if($result->rowCount() === 0){
              
               echo('false');
               
            }
            else{
                $_SESSION["id"] = $table["id"];
                echo('true');
//               echo $_SESSION["id"];
            }
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function checkExistance($table){
        try{

            $database = SModel::getInstance();
            $query="SELECT * FROM utilisateur WHERE ";
             foreach($table as $key=>$value){
                $query.=$key."='".$value."' AND "; 
             }
             $query = substr($query,0,strlen($query)-4);
           
            $result = $database->query($query);
            if($result->rowCount() === 0){
                echo('true');
            }
            else{
                echo('false');
            }
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }


    public static function chercherUtilisateur(){
        try{
            $id = $_SESSION['id'];
            $database = SModel::getInstance();
            $query="SELECT * FROM utilisateur WHERE id = '$id'";
            $result = $database->query($query);
            $list = $result->fetchAll(PDO::FETCH_CLASS,"ModelUtilisateur");
            return $list;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function modifyUtilisateur($table){
        try{
            $database = SModel::getInstance();
            $query="UPDATE `utilisateur` SET `nom` = :nom, `prenom` = :prenom, `telephone` = :telephone, `password` = :password, `ad_mail` = :ad_mail WHERE `utilisateur`.`id` = :id;";
            $result = $database->prepare($query);
            $result ->execute(['nom' => $table['nom'], 'prenom' => $table['prenom'], 'telephone' => $table['telephone'], 'password' => $table['password'], 'ad_mail' => $table['ad_mail'], 'id' => $_SESSION['id']]);
            return True;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

}

