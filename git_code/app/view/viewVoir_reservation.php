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
    <div class="jumbotron">
        <h1>Welcome <?php echo($_COOKIE['id']);?> !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if(!empty($results)){
        echo "<table class = 'table table-striped table-bordered'>"
            . "<thead>
        <tr>
            <th scope = 'col'>Num palque</th>
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

            printf(
                "<tr><td>%s</td><td><a href='../controller/router.php?action=infoUtilisateur&controlleur=administrateur&utilisateur=%s'>%s</a></td><td>%s</td><td>%s</td><td>%s</td><td><a href='../controller/router.php?action=changeCondition&controlleur=administrateur&nplaque=%s&emprunteur=%s&datedebut=%s&condition=%s'>%d</a></td><td>%d</td></tr>",
                $mv->getNPlaque(), $mv->getEmprunteur(),$mv->getEmprunteur(), $mv->getLabelDuParking(), $mv->getDateDebut(), $mv->getDateFin(), $mv->getNPlaque(), $mv->getEmprunteur(),$mv->getDateDebut(), $mv->getTYPE(),$mv->getTYPE(), $mv->getCout());

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


//
//    $('.condition').avgrund({
//        onBlurContainer: '#my-container'
//    });
//
//    function showWindow(obj){
//
//    $('.emprunteur').avgrund({
//            height: 700,
//            width: 700,
//            holderClass: 'custom',
//            showClose: true,
//            showCloseText: 'Close',
//            openOnEvent: false,
//            enableStackAnimation: true,
//            onBlurContainer: '.container',
//            template: "<?php //include'../view/viewInfoUtilisateur.php'?>//",
//            onLoad:  $.ajax({
//                    type:'GET',
//                    url:"../view/viewInfoUtilisateur.php",
//                    data:{text:obj.id}
//                     }),
//
//        });
//    }
//
//    function printpbj(obj){
//        document.getElementById("output").innerHTML = obj.id;
//    }
</script>