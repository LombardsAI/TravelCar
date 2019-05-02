<?php
$lieu_select = $_GET["lieu"];
$date_begin_select = $_GET["date_debut"];
$date_end_select = $_GET["date_fin"];
$con = mysqli_connect('localhost', 'root', '');
if (!$con)
 {
 die('Could not connect: ' . mysqli_error());
 }
 mysqli_select_db($con, "travelcar");
