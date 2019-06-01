<?php
require ('fragmentHeader.html');
include('library_form.php');
//include ('../model/ModelReservation.php');
?>

    <script>
        function choose_research(choix) {
               $("#option").attr("value",choix);
            }
          function check_time(){

            var date_debut = document.research.date_debut.value.split("/");
            var date_fin = document.research.date_fin.value.split("/");
            var time_debut =  document.research.time_debut.value;
            var time_fin =  document.research.time_fin.value;
            var date_temp_debut=date_debut[2]+'/'+date_debut[0]+'/'+date_debut[1]+' '+time_debut+':00';
            var date_temp_fin=date_fin[2]+'/'+date_fin[0]+'/'+date_fin[1]+' '+time_fin+':00';
            var begin = new Date(date_temp_debut);
            var end = new Date(date_temp_fin);
            if(begin < end){
                return true;
            }
            else {
                $("#error_time").html("Please enter the correct time!");
                return false;
            }
        }
            
    </script>
    <body>
        <div class="container">
        <?php include 'fragmentMenu.html'; ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Travel Car</h3>
                </div>
            </div>
            <div class="jumbotron">
                <h1>Welcome <?php echo($_COOKIE['id']);?> !</h1>
                <p>Maximaliser le valeur de vos voitures ....</p>
            </div>
            <p/>

        <div class="panel panel-danger size_1 center">

            <div class='panel-heading' >
                Reserver Parking
            </div>
            <div class='panel-body'>
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
            <form name='research' id ="research" method='get' action="../controller/router.php" onsubmit="return check_time()" autocomplete="off">
                <?php
                if($check=="parking"){
                 echo "<input class='hidden' name='action' value='reserverParkingDetail'>";
                }
                else{
                     echo "<input class='hidden' name='action' value='reserverVehiculeDetail'>";
                }
                   ?>
                <input class="hidden" name="controlleur" value="reservation">
            <div class="boite_2">
                <?php
              form_select("param1","aeroport",1,$lieu );
              ?>
            </div>
            <div class="boite_2">
                <div class="boite_4">
               <h5>date_debut</h5>
               <input id='option' name='option' value='reserver' hidden>
               <input  type="text" class="auto-kal" data-kal="mode: 'single', direction: 'today-future'" name="date_debut" size="11" >
               <?php
               form_select("","time_debut",1,$time );
               ?>
                </div>
               </div>
            <div class="boite_2">
                <div class="boite_4">
                <h5>date_fin</h5>
                <input type="text" class="auto-kal" data-kal="mode: 'single', direction: 'today-future'" name="date_fin" size="11">
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
        </div>
        </div>
        </div>

    <?php require ('fragmentFooter.html')?>

