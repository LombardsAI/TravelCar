  <?php     
           if(isset($_SESSION["id"])){
            echo  $_SESSION["id"];
        }
        else {
            echo "Madame/Monsieur";
        }
        ?>

