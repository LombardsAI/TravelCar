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
            <th scope = 'col'>Label</th>
            <th scope = 'col'>Date début</th>
            <th scope = 'col'>Date fin</th>
             <th scope = 'col'>Place</th>
            <th scope = 'col'>Coût</th>
            <th scope = 'col'>Etat</th>
        </thead>
        <tbody>";
foreach ($results as $row){
    
      unset($row['id_client']);
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
        echo "&nbsp";
         if($value=="A TRAITER"){
             $table["n_plaque"] = $row["n_plaque"];
             $table["date_debut"] = $row["date_debut"];
             $str=json_encode($table); 
            echo "<button onclick = 'cancel($str)' style='background-color:red'>Annuler</button>";
        }
        echo "</td>";
        
    }
    echo "</tr>";
}
    echo "</tbody>";
    
}
else{
    echo "Vous avez encore parking";
}
?>
<script>
function cancel(info){
    var confirm = window.confirm("Vous êtes sûr? Vous deverez payer 50% de prix quand même si vous annulez");
    if(confirm){
    var str = JSON.stringify(info);
    var arr = JSON.parse(str);
    var url = "router.php?action=delete_gare&controlleur=utilisateur";
     for(var key in arr){
     url+='&'+key+'='+arr[key];
 }
 window.location.href = url;
}
}
</script>