<?php
include ('library_form.php');
?>
<html>
    <head>
        <title>acceuil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="./pattern.css" />
    </head>
    <body>
        <h1>Bienvenue à TravelCar!</h1>
          <div class="boite center">
            
            <div class="boite_1">Réserver une place</div>
            <div class="boite_1">Emprunter une voiture</div>
        </div>
        <div class="boite center">
            <?php
            $lieu = array("Paris","Troyes");
            form_begin("recherche","get","reserver.php");
            ?>
            <div class="boite_2">
                <?php
              form_select("lieu","lieu",1,$lieu );
              ?>
            </div>
            <div class="boite_2">
               <?php
               form_input("date_debut",5);
               ?>
               </div>
            <div class="boite_2">
                <?php
                form_input("date_fin",5);
                ?>
            </div>
             <div class="boite_2">
                <?php
               form_input_submit("Recherche");
               form_end();
                ?>
            </div>
        </div>
    </body>
</html>
