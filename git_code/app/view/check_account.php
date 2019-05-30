<?php
include("../model/general_connection_sql.php");
//$id = $_GET["id"];
//$pw = $_GET["password"];
//$con = mysqli_connect('localhost', 'root', '');
//if (!$con)
// {
// die('Could not connect: ' . mysqli_error());
// }
// mysqli_select_db($con, "travelcar");
 $con = new Sql('localhost', 'root', '');
//$sql="SELECT id,password FROM utilisateur WHERE id='$id'AND password='$pw'";
 $sql="SELECT * FROM utilisateur WHERE ";
 foreach($_POST as $key=>$value){
     $sql.= $key."='".$value."' AND ";
 }
$sql = substr($sql,0,strlen($sql)-4);
$con->connection("travelcar");
//$result = mysqli_query($con, $sql);
$row = $con->check($sql);
if($row==false){
   echo("false");
}
 else {
     echo("true");
 }
$con->close();
