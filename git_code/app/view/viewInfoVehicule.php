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
<!--        <div class="boite_3">-->
            <form name="modify" id="modify" action="../controller/router.php" method="post" ng-app="" >
                <input type="hidden" name='action' value='modifierDone_vehicule'>
                <input type="hidden" name='controlleur' value='administrateur'>
                <label for='n_plaque'>No plaque</label>
                <br>
                <input name="n_plaque" readonly ng-model="n_plaque" ng-init="n_plaque ='<?php foreach($results as $mv){print($mv->getNPlaque());}?>'" required>
                <div>
                    <span style="color:red" ng-show="modify.n_plaque.$error.required && modify.n_plaque.$dirty">No plaque est vide</span>
                </div>
                <br>
                <label for='marque'>Marque</label>
                <br>
                <input name="marque" ng-model="marque" ng-init="marque ='<?php foreach($results as $mv){print($mv->getMarque());}?>'" required>
                <div>
                    <span style="color:red" ng-show="modify.marque.$error.required && modify.marque.$dirty">Marque est vide</span>
                </div>
                <br>
                <label for='capacité'>Capacité</label>
                <br>
                <input name="capacite" ng-model="capacite" ng-init="capacite ='<?php foreach($results as $mv){print($mv->getCapacité());}?>'" required >
                <div>
                    <span style="color:red" ng-show="modify.capacite.$error.required && modify.capacite.$dirty">Capacité est vide</span>
                </div>
                <br>
                <label for='prix_emprunte'>Prix emprunte</label>
                <br>
                <input name="prix_emprunte" ng-model="prix_emprunte" type="prix_emprunte" ng-init="prix_emprunte ='<?php foreach($results as $mv){print($mv->getPrixEmprunte());}?>'" required>
                <div>
                    <span style="color:red" ng-show="modify.prix_emprunte.$error.required && modify.prix_emprunte.$dirty && modify.prix_emprunte.$invalide">Prix Emprunte est vide</span>
                </div>
                <br>
                <?php
                form_input_submit("Modifier !");
                ?>
            </form>
        </div>
<!--    </div>-->
    </body>

<?php
include 'fragmentFooter.html'?>