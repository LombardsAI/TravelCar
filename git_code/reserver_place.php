<?php
include("reserve_search_action.php");
?>
<html>
<head>
    <title>acceuil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./pattern.css" />
    <link rel="stylesheet" href="build/kalendae.css" type="text/css" charset="utf-8">
    <script src="build/kalendae.standalone.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<h1>Bienvenue à TravelCar!</h1>
<?php
$time_debut = $_GET["date_debut"];
$time_debut.=" ".$_GET["time_debut"].":00";
$time_fin =$_GET["date_fin"];
$time_fin.=" ".$_GET["time_fin"].":00";
$info = array();
$info["aeroport"] = $_GET["lieu"];
$info["time_debut"] = $time_debut;
$info["time_fin"] = $time_fin;
$result = reserver_search($info);
if($result == false){
    echo ("Aucune résultat");
}
else {
    echo ("<div class='boite_key'>");
    foreach(array_keys($result[0]) as $key){
        echo("<div class='boite_arrange'>");
        echo($key);
        echo("</div>");
    }
    echo ("</div>");
    echo ("<div class='boite_key'>");
    foreach($result as $value){
        foreach($value as $valeur){
        echo("<div class='boite_arrange'>");
        echo($valeur);
        echo("</div>");
        }
        echo ("<br>");
    }
    echo ("</div>");
}
?>
</body>
