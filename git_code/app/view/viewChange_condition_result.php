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
        <h1>  Welcome <?php echo($_COOKIE['id']);?> !</h1>
        <p>  Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if ($results) {
        echo ("<h2>Condition est était modifié !</h2>");
//        echo ("<h3>id = " . $_COOKIE['id'] . "</h3>");
    } else {
        echo ("<h2>Il y a  un problème pour la modification</h2>");
    }
    include('fragmentFooter.html');
    ?>
</div>