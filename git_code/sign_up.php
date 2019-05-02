<?php
include ('library_form.php');
?>
<html>
    <head>
        <title>inscription</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="./pattern.css" />
        <script src="angular.min.js"></script>
    </head>
    <body>
        <h1>Bienvenue à TravelCar!</h1>
        <div class="boite_3">
        <form name="inscription" action="main_page.php" method="post" ng-app="">
                    <label for='nom'>nom</label>
                    <br>
                    <input name="nom" ng-model="nom" required><span style="color:red">*</span>
                    <div>
                        <span style="color:red" ng-show="inscription.nom.$error.required && inscription.nom.$dirty">Nom est vide</span>
                    </div>
                    <br>
                    <label for='prenom'>Prénom</label>
                    <br>
                    <input name="prenom" ng-model="prenom" required ><span style="color:red">*</span>
                    <div>
                       <span style="color:red" ng-show="inscription.prenom.$error.required && inscription.prenom.$dirty">Prénom est vide</span>
                    </div>
                    <br>
                    <label for='mail'>E-mail</label>
                    <br>
                    <input name="mail" ng-model="mail" type="email" required><span style="color:red">*</span>
                     <div>
                        <span style="color:red" ng-show="inscription.mail.$error.required && inscription.mail.$dirty && inscription.mail.$invalide">E-mail est vide</span>
                    </div>
                    <br>
                    <label for='id'>ID</label>
                    <br>
                    <input name="id" ng-model="id" required ><span style="color:red">*</span>
                    <div>
                       <span style="color:red" ng-show="inscription.id.$error.required && inscription.id.$dirty">ID est vide</span>
                       <script>
                           var myMap = {"id":document.inscription.id}
                       </script>
                       <span style="color:red" ng-show="check(myMap)">ID existe</span>
                    </div>
                    <br>
                    <label for='password'>Mot de passe</label>
                    <br>
                    <input name="password" type = "password" ng-model="password" required ><span style="color:red">*</span>
                    <div>
                       <span style="color:red" ng-show="inscription.password.$error.required && inscription.password.$dirty">Mot de passe est vide</span>
                    </div>
                    <br>
                    <?php
                    form_input_submit("Valider");
                    ?>
                </form>
            </div>

        <script src="check_ajax.js"></script> 
    </body>
</html>