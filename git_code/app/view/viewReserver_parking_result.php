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
            <th scope = 'col'>aeroport</th>
            <th scope = 'col'>label</th>
            <th scope = 'col'>prix par heure</th>
            <th scope = 'col'>adresse</th>
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
 $str=json_encode($info);

        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {
     
//   $info_label = array();
  $temp="label_du_parking=". $mv->getLabel();
  $cout = ceil($mv->getPrix()*((strtotime($info["date_fin"])-strtotime($info["date_debut"]))/3600));
  $temp.="&cout=".$cout;
            printf(
                "<tr class = 'choose' id = '$temp' style='cursor:pointer' onclick='getPlaque(this,$str)' ><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>",
                $mv->getAeroport(), $mv->getLabel(), $mv->getPrix(), $mv->getAdresse());
            
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
  var er = /(?<=cout=)\d*/;
str = t.id;
 var cout =str.match(er);
 var pay = "Vous devez payer "+cout +" euros";
 var confirm = window.confirm(pay);
 if(confirm){
    var url =  'router.php?action=add_gare&controlleur=reservation&';
    var n_plaque = window.prompt("veuillez entrer votre numéro de plaque","");
    var er = RegExp('^[A-Za-z0-9]+$');
    if (er.test(n_plaque) ){
     n_plaque = n_plaque.toUpperCase();

 for(var key in arr){
     url+=key+'='+arr[key]+'&';
 }
    url+=t.id+'&n_plaque='+n_plaque;
//    alert(url);
    window.location.href = url;
    }
    else{
        alert("Veillez entrer correctement votre numéro de plaque");
    }
 }
            
}

</script>