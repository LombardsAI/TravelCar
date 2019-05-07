<?php
include("general_connection_sql.php");
function reserver_search($info){
////echo $info['time_debut'];

$con = new Sql("localhost", "root", "");
$sql = "SELECT aeroport, p.label, prix_du_jour, adresse FROM parking p, "
        . "(SELECT count(*) as num, label_du_parking as label FROM gare g WHERE "
       . "unix_timestamp(g.date_debut) < unix_timestamp('" .$info["time_debut"] ."') OR "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
        . "unix_timestamp(g.date_fin) > unix_timestamp('" .$info["time_fin"]."'))a WHERE "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
        . "(p.aeroport ='" .$info["aeroport"] ."'AND"
//        . " p.aeroport ='CDG' AND"
        . " p.label = a.label AND "
        . " p.nombre_max > a.num) OR (p.label NOT IN (a.label))";


$con->connection("travelcar");
$row = $con->check($sql);
$con->close();
return $row;       
}