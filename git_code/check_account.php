<?php
//$id = $_GET["id"];
//$pw = $_GET["password"];
$con = mysqli_connect('localhost', 'root', '');
if (!$con)
 {
 die('Could not connect: ' . mysqli_error());
 }
 mysqli_select_db($con, "travelcar");
//$sql="SELECT id,password FROM utilisateur WHERE id='$id'AND password='$pw'";
 $sql="SELECT id,password FROM utilisateur WHERE ";
 foreach($_GET as $key=>$value){
     $sql.= $key."='".$value."' AND ";
 }
$sql = substr($sql,0,strlen($sql)-4);

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
if($row==false){
   echo("false");
}
 else {
     echo("true");
 }
mysqli_close($con);
