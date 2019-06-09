<?php
include 'fragmentHeader.html';
//require_once '../model/ModelReservation.php';
?>
<body>
<div class="container">
    <?php include 'fragmentMenu.html'; ?>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Travel Car</h3>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Welcome,
       <?php     
       require_once 'check_session.php';
        ?>
                !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
<?php
if(!isset($_SESSION["id"])){
    $_SESSION["url_reservation"] = $_SERVER['REQUEST_URI'];
}
else{
    if(isset($_SESSION["url_reservation"]))
    {
    unset( $_SESSION["url_reservation"]);
    
    }
}
if(!empty($results)){
   echo "<table class = 'table table-striped table-bordered'>"
    . "<thead>
        <tr>
           <th scope = 'col'>marque</th>
            <th scope = 'col'>capacité</th>
            <th scope = 'col'>label</th>
            <th scope = 'col'>prix du jour</th>
            <th scope = 'col'>adresse</th>
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
$str=json_encode($info); 
unset($info["marque"]);
 unset($info["capacite"]);
        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {
     
//   $info_label = array();
  $temp="n_plaque=".(string)$mv->getPlaque();
  $temp.="&label_du_parking=". $mv->getLabel();
  $cout = ceil($mv->getPrix()*((strtotime($info["date_fin"])-strtotime($info["date_debut"]))/86400));
  $temp.="&cout=".$cout;
 
  
            printf(
                "<tr class = 'choose' id = '$temp' style='cursor:pointer' onclick='getPlaque(this,$str)' ><td>%s</td><td>%d</td><td>%s</td><td>%d</td><td>%s</td></tr>",
                $mv->getMarque(), $mv->getCapacite(), $mv->getLabel(),$mv->getPrix(), $mv->getAdresse());
            
        }
    
}
else {
    echo "Désolé, il y a pas de place correspondante acuellement";
}

        ?>
        </tbody>
    </table>
</div>
<?php include 'fragmentFooter.html'; ?>
<script>

function getPlaque(t,info) {
var str = JSON.stringify(info);
 var arr = JSON.parse(str);
 str = t.id;
 var er = /(?<=cout=)\d*/;
 var cout =str.match(er);
 var pay = "Vous devez payer "+cout +" euros";
 var confirm = window.confirm(pay);
 if(confirm){
    var url =  'router.php?action=add_emprunte&controlleur=reservation&';
 for(var key in arr){
     url+=key+'='+arr[key]+'&';
 }
    url+=str;
    
    window.location.href = url;
    }
}
            

</script>
