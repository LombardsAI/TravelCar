<?php
include('library_form.php');
include 'fragmentHeader.html';
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
              <h1>Welcome,
       <?php     
       require_once 'check_session.php';
        ?>
                !</h1>
            <p>  Maximaliser le valeur de vos voitures ....</p>
        </div>
<!--        <div class="boite_3">-->
            <form name="modify" id="modify" action="../controller/router.php" method="post" ng-app="" >
                <input type="hidden" name='action' value='modifierPasswordDone'>
                <input type="hidden" name='controlleur' value='utilisateur'>    
                 <br>
                <input name="password" type = "password" ng-model="password"  required >
                <div>
                 <span style="color:red" ng-show="modify.password.$error.required && modify.password.$dirty">Mot de passe est vide</span>
                  <?php
                form_input_submit("Valider");
                ?>
            </form>
</body>

<?php
include 'fragmentFooter.html'?>