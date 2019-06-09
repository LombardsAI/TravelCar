<?php
include('library_form.php');
include 'fragmentHeader.html';
?>
        <body>
        <div class="signContainer">
            <!-- Jumbotrom -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Travel Car</h3>
                </div>
            </div>
            <div class="jumbotron">
                <h1>  Welcome ! </h1>
                <p>  Maximaliser le valeur de vos voitures ....</p>
            </div>

        <div class="panel panel-danger size_1 center">

            <div class='panel-heading' >
            <?php
            echo ("Login")
            ?>
            </div>
            <div class='panel-body'>

                <form name="login" id="login" action="../controller/router.php" method="post" ng-app="" onsubmit="return return_Info(); " >
                    <input class="hidden" id="action" name="action" value="accueil">
                    <input class="hidden" id="controlleur" name="controlleur" value="utilisateur">
                    <label for='User_name'>ID</label>
                    <br>
                    <input name="ID" ng-model="ID" required>
                    <div>
                        <span style="color:red" ng-show="login.ID.$error.required && login.ID.$dirty">ID est vide</span>
                    </div>
                    <br>
                    <label for='password'>Password</label>
                    <br>
                    <input name="password" ng-model="passward" required >
                    <div>
                        <span style="color:red" type="password" ng-show="login.password.$error.required && login.password.$dirty">Mot de passe est vide</span>
                    </div>
                    <br>
                    <div>
                        <span id="error_msg" style="color:red" hidden>Wrong user</span>
                    </div>
                    <br>
                    
                  <button onmouseover="set_check()" onkeyup="set_check()" class="mdc-button__label">Connecter</button>
                    <br>
                    <a href="../view/viewSign_up.php">Pas un utilisateur ?</a>

            </div>
        </div>

      
    </body>


</div>
<?php
include 'fragmentFooter.html';?>
 <script>
        function set_check(){
            var id = document.login.ID.value;
            var pw = document.login.password.value;
            var myMap = new Map();
            myMap.set("id",id);
            myMap.set("password",pw);
            checkAccount(myMap,'sign_in');
//            document.cookie='id='+id;
        }
    </script>