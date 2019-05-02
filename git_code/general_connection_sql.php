<?php
//attribut global pour connection
$con = mysqli_connect('localhost', 'root', 'root');

//esseayer de connecter
function sql_conection(){
    global $con;
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con, "travelcar");
}

//si c'est pour verifier l'existance d'un valeur
function sql_check($sql){
    global $con;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if($row==false){
        echo("false");
    }
    else {
        echo("true");
    }
}

//si c'est pour returne une requête
function sql_return_value($sql){
    global $con;
    $result = mysqli_query($con, $sql);
    return $result;
}

//clôture d'un sql
function sql_close(){
    global $con;
    mysqli_close($con);
}

function general_requete($sql){
    sql_conection();
    $result = sql_return_value($sql);
    sql_close();
    return $result;
}

function general_existance($sql){
    sql_conection();
    sql_check($sql);
    sql_close();
}

$id = $_GET["id"];
$pw = $_GET["password"];
general_existance("SELECT id,password FROM utilisateur WHERE id='$id'AND password='$pw'");
?>