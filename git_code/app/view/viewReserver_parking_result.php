<?php
include 'fragmentHeader.html';
require_once '../model/ModelReservation.php';
?>
<body>
<div class="container">
    <?php include 'fragmentMenu.html'; ?>
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

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">aeroport</th>
            <th scope = "col">label</th>
            <th scope = "col">prix du jour</th>
            <th scope = "col">adresse</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {
            printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>",
                $mv->getAeroport(), $mv->getLabel(), $mv->getPrix(), $mv->getAdresse());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include 'fragmentFooter.html'; ?>
