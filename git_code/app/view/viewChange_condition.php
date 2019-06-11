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
    <?php
        function formselect($label, $liste, $table) {
            echo ("<h5>$label</h5>");
            echo ("<select class= 'form-control' size=1 name='condition' required>");
            foreach ($liste as $key=>$val)
                if($key == $table['condition']) {
                    echo("<option value=$key selected>$val</option>");
                }
                else{
                    echo("<option value=$key>$val</option>");
                }
            echo ("</select>");
        }
        $liste=array('0'=>'reservé','1'=>'en train','2'=>'déjà fait','-1'=> 'supprimmé','-2'=>'problème');
        form_begin("change","GET","../controller/router.php");
        formselect('Change la condition',$liste,$param);
        echo"<input id='action' name='action' value='conditionChanged' hidden>"
        . "<input id='reservation' name='reservation' value=".$param['reservation']." hidden>"
        . "<input id='controlleur' name='controlleur' value='administrateur' hidden>"
               . "<input id='n_plaque' name='n_plaque' value=".$param['nplaque']." hidden>"
                . "<input id='emprunteur' name='emprunteur' value=".$param['emprunteur']." hidden>"
                . "<input id='date_debut' name='date_debut' value=".$param['datedebut']." hidden>"
                . "<br>";

        form_input_submit("Change !");
        form_end();

        ?>
    <?php include 'fragmentFooter.html'; ?>
