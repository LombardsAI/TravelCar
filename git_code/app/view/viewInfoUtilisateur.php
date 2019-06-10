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
        <h1>Welcome <?php require_once 'check_session.php';?> !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if(!empty($results)){
        echo "<table class = 'table table-striped table-bordered'>"
            . "<thead>
        <tr>
            <th scope = 'col'>ID</th>
            <th scope = 'col'>Nom</th>
            <th scope = 'col'>Prenom</th>
            <th scope = 'col'>Telephone</th>
            <th scope = 'col'>adress_mail</th>
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
//        $str=json_encode($info);

        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {

//   $info_label = array();

            printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><a href='Mailto:%s'>%s</a></td></tr>",
                $mv->getId(), $mv->getNom(),$mv->getPrenom(), $mv->getTelephone(), $mv->getAdMail(),$mv->getAdMail());

        }

    }
    else {
        echo "Désolé, il n'y a pas ce utilisateur";
    }

    ?>
    </tbody>
    </table>


    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Histoire de Parking</h3>
        </div>
    </div>
<?php
if(!empty($resultsParking)){
   echo "<table class = 'table table-striped table-bordered'>"
    . "<thead>
        <tr>
            <th scope = 'col'>Plaque</th>
            <th scope = 'col'>Label</th>
            <th scope = 'col'>Date début</th>
            <th scope = 'col'>Date fin</th>
             <th scope = 'col'>Place</th>
            <th scope = 'col'>Coût</th>
            <th scope = 'col'>Etat</th>
        </thead>
        <tbody>";
foreach ($resultsParking as $row){

      unset($row['id_client']);
    if($row['TYPE']==0){
        $color = "pink";
         $row['TYPE']="A TRAITER";
    }
    else if($row['TYPE']==1){
        $color = "blue";
        $row['TYPE']="AU COURANT";
    }
     else if($row['TYPE']==2){
        $color = "green";
        $row['TYPE']="FINI";
    }
     else if($row['TYPE']==-1){
        $color = "red";
        $row['TYPE']="ANNULLE";
    }
    else if($row['TYPE']==-2){
        $color = "red";
        $row['TYPE']="A PROLOGER";
    }
    echo "<tr style='color:$color'>";

    foreach($row as $value){
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    echo "</tr>";
}
    echo "</tbody></table>";

}
else{
    echo "Il n'a pas encore parking";
}
?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Histoire d'emprunte</h3>
        </div>
    </div>
    <?php
if(!empty($resultsEmprunte)){
   echo "<table class = 'table table-striped table-bordered'>"
    . "<thead>
        <tr>
            <th scope = 'col'>Plaque</th>
            <th scope = 'col'>Label</th>
            <th scope = 'col'>Date début</th>
            <th scope = 'col'>Date fin</th>
            <th scope = 'col'>Coût</th>
            <th scope = 'col'>Etat</th>
        </thead>
        <tbody>";
foreach ($resultsEmprunte as $row){
    unset($row['emprunteur']);
    if($row['TYPE']==0){
        $color = "pink";
         $row['TYPE']="A TRAITER";
    }
    else if($row['TYPE']==1){
        $color = "blue";
        $row['TYPE']="AU COURANT";
    }
     else if($row['TYPE']==2){
        $color = "green";
        $row['TYPE']="FINI";
    }
     else if($row['TYPE']==-1){
        $color = "red";
        $row['TYPE']="ANNULLE";
    }
    else if($row['TYPE']==-2){
        $color = "red";
        $row['TYPE']="A PROLOGER";
    }
    echo "<tr style='color:$color'>";

    foreach($row as $value){
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    echo "</tr>";
}
    echo "</tbody></table>";

}
else{
    echo "IL n'a pas emprunté";
}
?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Histoire de Pret</h3>
        </div>
    </div>
    <?php
if(!empty($resultsPret)){
   echo "<table class = 'table table-striped table-bordered'>"
    . "<thead>
        <tr>
            <th scope = 'col'>Plaque</th>
            <th scope = 'col'>Emprunteur</th>
            <th scope = 'col'>Label</th>
            <th scope = 'col'>Date début</th>
            <th scope = 'col'>Date fin</th>
            <th scope = 'col'>Coût</th>
            <th scope = 'col'>Etat</th>
        </thead>
        <tbody>";
foreach ($resultsPret as $row){
    if($row['TYPE']==0){
        $color = "pink";
         $row['TYPE']="A TRAITER";
    }
    else if($row['TYPE']==1){
        $color = "blue";
        $row['TYPE']="AU COURANT";
    }
     else if($row['TYPE']==2){
        $color = "green";
        $row['TYPE']="FINI";
    }
     else if($row['TYPE']==-1){
        $color = "red";
        $row['TYPE']="ANNULLE";
    }
    else if($row['TYPE']==-2){
        $color = "red";
        $row['TYPE']="A PROLOGER";
    }
    echo "<tr style='color:$color'>";

    foreach($row as $value){
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    echo "</tr>";
}
    echo "</tbody></table>";

}
else{
    echo "  Pas d'hisoire";
}
?>

</div>

<?php
include 'fragmentFooter.html'; ?>
