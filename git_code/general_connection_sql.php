<?php
class Sql{
//attribut pour connection
private $con;

function __construct($name_sql,$id,$pw) {
    $this->con = mysqli_connect($name_sql,$id,$pw);
}
//esseayer de connecter
function conection($table){
    if (!$this->con)
    {
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($this->con, $table);
}

//si c'est pour verifier l'existance d'un valeur
function check($sql){
  
    $result = mysqli_query($this->con, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

//clôture d'un sql
function close(){
    mysqli_close($this->con);
}


}

