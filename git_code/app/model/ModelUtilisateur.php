<?php
require_once 'SModel.php';

class ModelUtilisateur
{
    private $id, $nom, $prenom, $telephone, $password, $ad_mail;


    public function __construct($id, $nom, $prenom, $telephone, $password, $ad_mail)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->password = $password;
        $this->ad_mail = $ad_mail;
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

    public static function insert($id, $nom, $prenom, $telephone, $password, $ad_mail) {
        try {
            $database = SModel::getInstance();
            $query = "insert into utilisateur value (:id, :nom, :prenom, :telephone, :password, :ad_mail)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'telephone' => $telephone,
                'password' => $password,
                'ad_mail' => $ad_mail
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function checkAccount($id,$pw){
        try{

            $database = SModel::getInstance();
            $query="SELECT * FROM utilisateur WHERE id = '$id' and password = '$pw'";
            $result = $database->query($query);
            if($result->rowCount() === 0){
                echo('false');
            }
            else{
                echo('true');
            }
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    public static function checkExistance($id){
        try{

            $database = SModel::getInstance();
            $query="SELECT * FROM utilisateur WHERE id = '$id'";
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
}

