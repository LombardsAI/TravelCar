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

     <?php form_begin('find','get','../controller/router.php');
     echo'<input name=action value=findResult hidden>';
     echo'<input name=controlleur value=administrateur hidden>';
     form_input('contenu','30');
     form_select('type','type',2,array('utilisateur','voiture'));
     echo'<br>';
     form_input_submit('FIND !');
     form_end();
     ?>

</div>
<?php include 'fragmentFooter.html'; ?>