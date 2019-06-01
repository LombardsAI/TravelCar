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
        <h1>Welcome <?php echo($_COOKIE['id']);?> !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
<?php
if(!empty($results)){
   echo "<table class = 'table table-striped table-bordered'>"
    . "<thead>
        <tr>
            <th scope = 'col'>aeroport</th>
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

        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {
        ?>
    
   <?php    
//   $info_label = array();
  $temp=(string)$mv->getLabel();
//  $info_label[++$num]=(string)$temp;
//  echo $info_label[$num];
//  echo $info_url;
            printf(
                "<tr class = 'choose' id = $temp style='cursor:pointer' onclick='getPlaque(this,$str)' ><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>",
                $mv->getAeroport(), $mv->getLabel(), $mv->getPrix(), $mv->getAdresse());
            
        }
        ?>
            
        
        <?php
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
    var url =  'router.php?action=add_gare&controlleur=reservation&';
    var n_plaque = window.prompt("veuillez entrer votre numéro de plaque","");
    if (n_plaque !== null){
       
 for(var key in arr){
     url+=key+'='+arr[key]+'&';
 }
    url+='label_du_parking='+t.id+'&n_plaque='+n_plaque;

    window.location.href = url;
    }

            
}

</script>