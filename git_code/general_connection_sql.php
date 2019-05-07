<?php
class Sql{
//attribut pour connection
private $con;

function __construct($name_sql,$id,$pw) {
    $this->con = mysqli_connect($name_sql,$id,$pw);
}
//esseayer de connecter
function connection($table){
    if (!$this->con)
    {
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($this->con, $table);
}

//si c'est pour verifier l'existance d'un valeur
function check($sql){
  
    $result = mysqli_query($this->con, $sql);
    if($result == false){
        return $result;
    }
    else{
    $result_sql=array();
    while($row = mysqli_fetch_assoc($result)){
     array_push($result_sql,$row);   
    }
    return $result_sql;
    }
}

function execute($sql){
    $result = mysqli_query($this->con, $sql);
    return $result;
}

//clôture d'un sql
function close(){
    mysqli_close($this->con);
}


}

