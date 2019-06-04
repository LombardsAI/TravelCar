<?php
include('library_form.php');
include 'fragmentHeader.html';
?>
<!--    <script type="text/javascript">
        $(document).ready(function() {
            $("#id").blur(function () {
                var id = document.inscription.id.value;
                var myMap = new Map();
                myMap.set("id", id);
                checkAccount(myMap, 'sign_up');
                document.cookie = "id=" + id;
            });
        });
    </script>-->
    <body>
    <div class="signContainer">
        <!-- Jumbotrom -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Travel Car</h3>
            </div>
        </div>
        <div class="jumbotron">
            <h1>  Welcome, Madame/Monsieur! </h1>
            <p>  Maximaliser le valeur de vos voitures ....</p>
        </div>
        <div class="boite_3">
        <form name="inscription" id="inscription" action="../controller/router.php" method="post" ng-app="" onsubmit="return return_Info(); ">
            <input type="hidden" name='action' value='signUpDone'>
            <input type="hidden" name='controlleur' value='utilisateur'>
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
                    <input name="ad_mail" ng-model="mail" type="email" required><span style="color:red">*</span>
                     <div>
                        <span style="color:red" ng-show="inscription.mail.$error.required && inscription.mail.$dirty && inscription.mail.$invalide">E-mail est vide</span>
                    </div>
                    <br>
                    <label for='telephone'>Téléphone</label>
                    <br>
                    <input name="telephone" ng-model="telephone" required ><span style="color:red">*</span>
                    <div>
                        <span style="color:red" ng-show="inscription.telephone.$error.required && inscription.telephone.$dirty">Télephone est vide</span>
                    </div>
                    <br>
                    <label for='id'>ID</label>
                    <br>
                    <input name="id" ng-model="id" id="id" required ><span style="color:red">*</span>
                    <div>
                       <span style="color:red" ng-show="inscription.id.$error.required && inscription.id.$dirty">ID est vide</span>

                       <span style="color:red" id="error_msg" hidden>Existe!</span>
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
</div>
    </body>
<script type="text/javascript">
      
            $(document).ready(function(){ 
            var myMap = new Map();
            $("#id").on('input',function(){
                myMap.set("id",document.inscription.id.value);
                checkAccount(myMap,"sign_up");
             });
            
           }
            
      );
        </script>

<?php
include 'fragmentFooter.html'?>