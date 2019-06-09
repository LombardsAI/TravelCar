<?php
include 'fragmentHeader.html';
?>
<div class="container">
    <?php include 'fragmentMenu.html'; ?>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Histoire de Parking</h3>
        </div>
   </div>
<?php
if(!empty($results)){
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
foreach ($results as $row){
    if($row['TYPE']==0){
        $color = "yellow";
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
    echo "</tbody>";
    
}
else{
    echo "Pas d'hisoire";
}
