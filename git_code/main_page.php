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
        <script src="jquery-3.3.1.js"></script>
        <script>
           
           function choose_research(choix) {
               $("#option").attr("value",choix);
            }
           
       
     </script> 
     <script>
         
              function check_time(){
                 
                var date_debut = document.research.date_debut.value.split("/");
                var date_fin = document.research.date_fin.value.split("/");
                var time_debut =  document.research.time_debut.value.split(":");
                var time_fin =  document.research.time_fin.value.split(":");
                var begin = new Date(date_debut[2],date_debut[0],date_debut[1],time_debut[0],time_debut[1]);
                var end = new Date(date_fin[2],date_fin[0],date_fin[1],time_fin[0],time_fin[1]);
                if(begin < end){
                    return true;
                }
                else {
                    $("#error_time").html("Please enter the correct time!");
                    return false;
                }
            }
            
         </script>
    </head>
        <body>
            <div class="navbar-fixed-top navbar-inverse nav-justified pilot_main">

            <div class="pilot_1 "> Travelcar</div>
            <div class="pilot_1 pilot_2" onmouseover="show_account()" onmouseout="hide_account()"> Espace Pernonelle ▼
            <div class="pilot_espace_1" hidden>
                <div class="pilot_espace_2">History of parking</div>
                <div class="pilot_espace_2">History of renting</div>
                </div>
            </div>
        </div>
         <br>
         <br>
         <div class="boite_size center boite_margin">
        <h1>Bienvenue à TravelCar!</h1>
         </div>
        <div class="boite_size center " >
            <div class="boite_1"><button onclick="choose_research('reserver')">Réserver une place</button></div>
            <div class="boite_1"><button onclick="choose_research('emprunter')">Emprunter une voiture</button></div>
        </div>
        <div class="boite_size2 center boite_border">
            <?php
            $lieu = array("CDG","FRA","HEL","LCY","LHR","ORY","PVG","SHA");
            $time = array();
            $tmp = 0;
            while($tmp < 24){
             if($tmp < 10){
                 array_push($time,"0".$tmp.":00" );
                 array_push($time,"0".$tmp.":30" );
                 $tmp++;
             }
             else {
                 array_push($time,$tmp.":00" );
                 array_push($time,$tmp.":30" ); 
                 $tmp++;
             }
            }
            ?>
            <form name='research' id ="research" method='get' action="reserver_place.php" onsubmit="return check_time()" >
            <div class="boite_2">
                <?php
              form_select("lieu","lieu",1,$lieu );
              ?>
            </div>
            <div class="boite_2">
                <div class="boite_4">
               <h5>date_debut</h5>
               <input id='option' name='option' value='reserver' hidden>
               <input type="text" class="auto-kal" data-kal="mode: 'single', direction: 'future'" name="date_debut" size="11" >
               <?php
               form_select("","time_debut",1,$time );
               ?>
                </div>
               </div>
            <div class="boite_2">
                <div class="boite_4">
                <h5>date_debut</h5>
                <input type="text" class="auto-kal" data-kal="mode: 'single', direction: 'future'" name="date_fin" size="11">
                <?php
               form_select("","time_fin",1,$time );
               ?>
                </div>
            </div>
             <div class="boite_2">
                 <br>
                 <button class='btn btn-primary' type='submit'>Recherche</button>
                 
            <span id="error_time" style="color:red"></span>
            
            </div>
            </form>
            
        </div>
         <script>
         function show_account(){
             $(".pilot_espace_1").show();
         } 
         function hide_account(){
              $(".pilot_espace_1").hide();
         }
        </script>
        </body>
</html>

