<?php
include("../model/general_connection_sql.php");
$con = new Sql('localhost', 'root', 'root');
$sql = "INSERT INTO `utilisateur` (`nom`, `prenom`,  `ad_mail`, `telephone`, `id`, `password` ) VALUES (";
foreach($_POST as $key=>$value){
    $sql.=" '$value',";
}
$sql = substr($sql,0,strlen($sql)-1);
$sql.=")";
$con->connection("travelcar");
$result = $con->execute($sql);

//header("Location: viewReserver_parking.php");

$con->close();


