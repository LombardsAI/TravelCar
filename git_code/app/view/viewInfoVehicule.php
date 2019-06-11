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
                <label for='nom'>nom</label>
                <br>
                <input name="nom" ng-model="nom" ng-init="nom ='<?php foreach($results as $mv){print($mv->getNom());}?>'" required>
                <div>
                    <span style="color:red" ng-show="modify.nom.$error.required && modify.nom.$dirty">Nom est vide</span>
                </div>
                <br>
                <label for='prenom'>Prénom</label>
                <br>
                <input name="prenom" ng-model="prenom" ng-init="prenom ='<?php foreach($results as $mv){print($mv->getPrenom());}?>'" required >
                <div>
                    <span style="color:red" ng-show="modify.prenom.$error.required && modify.prenom.$dirty">Prénom est vide</span>
                </div>
                <br>
                <label for='mail'>E-mail</label>
                <br>
                <input name="ad_mail" ng-model="mail" type="email" ng-init="mail ='<?php foreach($results as $mv){print($mv->getAdMail());}?>'" required>
                <div>
                    <span style="color:red" ng-show="modify.mail.$error.required && modify.mail.$dirty && modify.mail.$invalide">E-mail est vide</span>
                </div>
                <br>
                <label for='telephone'>Téléphone</label>
                <br>
                <input name="telephone" ng-model="telephone" ng-init="telephone='<?php foreach($results as $mv){print($mv->getTelephone());}?>'" required >
                <div>
                    <span style="color:red" ng-show="modify.telephone.$error.required && modify.telephone.$dirty">Télephone est vide</span>
                </div>
                <br>
                <label for='password'>Mot de passe</label>
                <br>
                <input name="password" type = "password" ng-model="password" ng-init="password ='<?php foreach($results as $mv){print($mv->getPassword());}?>'" required >
                <div>
                    <span style="color:red" ng-show="modify.password.$error.required && modify.password.$dirty">Mot de passe est vide</span>
                </div>
                <br>
                <?php
                form_input_submit("Valider");
                ?>
            </form>
        </div>
<!--    </div>-->
    </body>

<?php
include 'fragmentFooter.html'?>