<?php
include("general_connection_sql.php");
function reserver_search($info,$msg){
////echo $info['time_debut'];

$con = new Sql("localhost", "root", "");
if($msg == "reserver"){
$sql = "SELECT aeroport, p.label, prix_du_jour, adresse FROM parking p, "
        . "(SELECT count(*) as num, label_du_parking as label FROM gare g WHERE "
       . "unix_timestamp(g.date_debut) < unix_timestamp('" .$info["time_debut"] ."') OR "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
        . "unix_timestamp(g.date_fin) > unix_timestamp('" .$info["time_fin"]."') GROUP BY label_du_parking)a WHERE "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
        . "(p.aeroport ='" .$info["aeroport"] ."'AND"
//        . " p.aeroport ='CDG' AND"
        . " p.label = a.label AND "
        . " p.nombre_max > a.num) OR (p.label NOT IN (a.label))";

}
else{
    $sql = "SELECT aeroport, p.label, adresse FROM parking p, "
        . "(SELECT label_du_parking as label,n_plaque FROM gare g WHERE "
       . "unix_timestamp(g.date_debut) < unix_timestamp('" .$info["time_debut"] ."') OR "
//       . "unix_timestamp(g.date_debut)< unix_timestamp('05/08/2019 00:00:00') OR "
        . "unix_timestamp(g.date_fin) > unix_timestamp('" .$info["time_fin"]."'))a WHERE "
//        . "unix_timestamp(g.date_fin)> unix_timestamp('05/09/2019 00:00:00'))a WHERE"
        . "p.aeroport ='" .$info["aeroport"] ."' AND "
        . " p.label = a.label AND "
        . " a.n_plaque NOT IN (SELECT e.n_plaque FROM emprunte e "
        . "WHERE unix_timestamp(e.date_fin) > unix_timestamp('" .$info["time_fin"] ."') OR  "
        . "unix_timestamp(e.date_debut) < unix_timestamp('" .$info["time_debut"] ."'))";
       
}

$con->connection("travelcar");
$row = $con->check($sql);
$con->close();
return $row;       
}