<?php
include 'fragmentHeader.html';
require_once 'library_form.php';
require_once '../model/ModelReservation.php';
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
<!--INSERT INTO `parking` (`label`, `aeroport`, `prix_par_heure`, `adresse`, `nombre_max`) VALUES ('Parking Roissy | Airpark CDG', 'FRA', '123', 'troyes, 27 bis avenue des lombards', '44000')-->
    <?php form_begin('ajouteParking','get','../controller/router.php');
    echo'<input name=action value=ajouteParkingResult hidden>';
    echo'<input name=controlleur value=administrateur hidden>';
    form_input('Label','30');
    $aeroport = array();
    foreach (ModelReservation::getTousAeroport() as $mv){
        array_push($aeroport,$mv['IATA']);
    }
    form_select('Aeroport','Aeroport',1,$aeroport);
    form_input('Prix par heure','11');
    form_input('Adresse','50');
    form_input('Nombre maximum','11');
    echo'<br>';
    form_input_submit('ADD');
    form_end();
    ?>

</div>
<?php include 'fragmentFooter.html'; ?><?php
