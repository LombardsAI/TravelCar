<?php
include 'fragmentHeader.html';
require_once 'library_form.php';
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
    <form action="../controller/router.php" method="GET">
        
    <?php
        echo "<input name='n_place' value =". $table['n_place'].">"
            . "<input name='emprunteur' value =". $table['emprunteur']." hidden>"
                . " <input name='n_plaque' value =". $table['nplaque']." hidden>"
                . " <input name='date_debut' value =". $table['datedebut']." hidden>"
                . "<input id='controlleur' name='controlleur' value='administrateur' hidden>"
                . "<input id='action' name='action' value='placeChanged' hidden>";
        form_input_submit("Change !");
        

        ?>
        </form>
    <?php include 'fragmentFooter.html'; ?>

