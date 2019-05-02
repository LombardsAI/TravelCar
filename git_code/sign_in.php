<?php
include ('library_form.php');
?>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="./pattern.css" />
        <script src="jquery-3.3.1.js"></script>
        <script src="angular.min.js"></script>
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            
           
          
    </head>
    <body class="center">
        <h1>Bienvenue à TravelCar!</h1>
        <br>
        <br>
        <div class="panel panel-danger size_1 center">

            <div class='panel-heading' >
<?php
echo ("Login")
?>
            </div>
            <div class='panel-body'>

                <form name="login" id="login" action="main_page.php" method="post" ng-app="" onsubmit="return return_info()" >
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
                        <span id="error_msg" style="color:red"></span>
                    </div>
                    <br>
                    
                  <button onmouseover="set_check()" onkeyup="set_check()" class="mdc-button__label">Connecter</button>

            </div>
        </div>

      
    </body>
   
</html>
 <script src="check_ajax.js"></script> 
    <script>
                function set_check(){
                    var id = document.login.ID.value;
                    var pw = document.login.password.value;
                    var myMap = new Map();
                    myMap.set("id",id);
                    myMap.set("password",pw);
                    check(myMap);
                }
    </script>              