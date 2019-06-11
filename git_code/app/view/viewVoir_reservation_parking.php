<?php
include 'fragmentHeader.html';
?>

<body>
<div class="container">
    <?php include 'fragmentMenuAdmin.html'; ?>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Travel Car</h3>
        </div>
    </div>
    <div >
        <input id='research_emprunte' >
    </div>
    <br>
    <?php
    if(!empty($results)){
        echo "<table class = 'table table-striped table-bordered'>"
            . "<thead>
        <tr id='tableHead'>
            <th scope = 'col'>Num plaque</th>
            <th scope = 'col'>Num place</th>
            <th scope = 'col'>emprunteur</th>
            <th scope = 'col'>Parking</th>
            <th scope = 'col'>Date début</th>
            <th scope = 'col'>Date dun</th>
            <th scope = 'col'>Condition</th>
            <th scope = 'col'>Coût</th>
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
//        $str=json_encode($info);

        // La liste des vins est dans une variable $results
        foreach ($reservation as $mv) {

//   $info_label = array();
           $id = $mv->getNPlaque()."&".$mv->getEmprunteur();
            printf(
                "<tr id='$id'><td>%s</td><td><a href='../controller/router.php?action=infoVehicule&controlleur=administrateur&n_plaque=%s'>%d</td><td><a href='../controller/router.php?action=infoUtilisateur&controlleur=administrateur&utilisateur=%s'>%s</a></td><td>%s</td><td>%s</td><td>%s</td><td><a href='../controller/router.php?action=changeCondition&controlleur=administrateur&nplaque=%s&emprunteur=%s&datedebut=%s&condition=%s'>%d</a></td><td>%d</td></tr>",
                $mv->getNPlaque(), $mv->getNPlace(),$mv->getNPlaque(),$mv->getEmprunteur(),$mv->getEmprunteur(), $mv->getLabelDuParking(), $mv->getDateDebut(), $mv->getDateFin(), $mv->getNPlaque(), $mv->getEmprunteur(),$mv->getDateDebut(), $mv->getTYPE(),$mv->getTYPE(), $mv->getCout());

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
 $(document).ready(function(){ 
            $("#research_emprunte").on('input',function(){
              //  alert(document.getElementById("research_emprunte").value);
                var str = document.getElementById("research_emprunte").value;
                if(str!==""){
                 $("tr:not([id*="+str+"])").hide();
                 $("#tableHead").show();
                 $("tr[id*="+str+"]").show();
             }
             else{
                 $("tr").show();
             }
                 
            })
        })

</script>

