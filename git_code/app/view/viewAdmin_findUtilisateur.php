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
        <h1>Welcome <?php echo($_SESSION['id']);?> !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if(!empty($results)){
        echo "<table class = 'table table-striped table-bordered'>"
            . "<thead>
        <tr>
            <th scope = 'col'>ID</th>
            <th scope = 'col'>Nom</th>
            <th scope = 'col'>Prénom</th>
       
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
//        $str=json_encode($info);

        // La liste des vins est dans une variable $results
        foreach ($results as $row) {
//   $info_label = array();
            echo'<tr>';
            foreach ($row as $key => $value){
                if($key == 'id'){
                    echo"<td><a href='../controller/router.php?action=infoUtilisateur&controlleur=administrateur&utilisateur=$value'". '>'.$value.'</a></td>';
                }
                    else{
                        echo'<td>'.$value.'</td>';
                    }
            }
            echo'</tr>';
        }
    }
    else {
        echo "Désolé, il y a pas d'utilisater correspondant ce nom.";
    }
    ?>
        </tbody>
    </table>
</div>
<?php include 'fragmentFooter.html'; ?>