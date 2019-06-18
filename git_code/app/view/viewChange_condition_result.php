<?php
include 'fragmentHeader.html';
?>
<body>
<div class="container">
    <?php
    include 'fragmentMenuAdmin.html';
    ?>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Travel Car</h3>
        </div>
    </div>
    <div class="jumbotron">
        <h1>  Welcome <?php echo($_SESSION['id']);?> !</h1>
        <p>  Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if ($results == 'changedone') {
        echo ("<h2>Condition est était modifié !</h2>");
    } else if($results == 'changeerror'){
        echo ("<h2>Il y a un problème pour la modification</h2>");
    }else if($results == 'adddone'){
        echo ("<h2>Parking est bien ajouté</h2>");
    }else if($results == 'adderror'){
        echo ("<h2>Il y a un problème pour l'ajout</h2>");
    } else if($results == 'modifierdone'){
        echo ("<h2>Information de véhicule est bien modifié</h2>");
    }else if($results == 'modifiererror'){
        echo ("<h2>Il y a un problème quant à modification</h2>");
    }else{
        print_r($results);
    }
    include('fragmentFooter.html');
    ?>
</div>