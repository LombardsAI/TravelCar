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
            <th scope = 'col'>No Plaque</th>
            <th scope = 'col'>Marque</th>
            <th scope = 'col'>Capacité</th>
            <th scope = 'col'>Prix du jour</th>
       
        </tr>
        </thead>
        <tbody>";
        foreach ($results as $row) {
//   $info_label = array();
            echo'<tr>';
            foreach ($row as $key => $value){
                echo'<td>'.$value.'</td>';
            }
            echo'</tr>';
        }
    }
    else {
        echo "Désolé, il y a pas de voiture correspondant ce nom.";
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

</div>
<?php include 'fragmentFooter.html'; ?>