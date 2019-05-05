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
        <link rel="stylesheet" href="build/kalendae.css" type="text/css" charset="utf-8">
        <script src="build/kalendae.standalone.js" type="text/javascript" charset="utf-8"></script>
        <script src="angular.min.js"></script>
        <script>
            form_research = "reserver_place";
           function choose_research(choix) {
               form_research = document.research;
               form_research.action = choix + ".php";
            }
            function submit_choice(){
                form_research.submit();
            }
     </script> 
    </head>
        <body>
        <h1>Bienvenue à TravelCar!</h1>
        <div class="boite_size center" >
            <div class="boite_1"><button onclick="choose_research('reserver_place')">Réserver une place</button></div>
            <div class="boite_1"><button onclick="choose_research('emprunter_voiture')">Emprunter une voiture</button></div>
        </div>
        <div class="boite_size2 center boite_border">
            <?php
            $lieu = array("Paris","Troyes");
            ?>
            <form name='research' method='get' action="">
            <div class="boite_2">
                <?php
              form_select("lieu","lieu",1,$lieu );
              ?>
            </div>
            <div class="boite_2">
               <h5>date_debut</h5>
               <input type="text" class="auto-kal" data-kal="mode: 'single', direction: 'future'" name="date_debut" size="10" >
               </div>
            <div class="boite_2">
                <h5>date_debut</h5>
                <input type="text" class="auto-kal" data-kal="mode: 'single', direction: 'future'" name="date_fin" size="10">
            </div>
             <div class="boite_2">
                 <button class='btn btn-primary' type='submit' onclick="submit_research()">Recherche</button>
            </div>
            </form>
        </div>
        </body>
</html>

