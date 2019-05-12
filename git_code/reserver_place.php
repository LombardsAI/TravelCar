<?php
include("reserve_search_action.php");
?>
<html>
    <head>
        <title>acceuil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Popup/avgrund.css">
        <link rel="stylesheet" href="Popup/style.css">
        <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="./pattern.css" />
        <link rel="stylesheet" href="build/kalendae.css" type="text/css" charset="utf-8">
        
        <script src="build/kalendae.standalone.js" type="text/javascript" charset="utf-8"></script>
        <script src="jquery-3.3.1.js"></script>

    </head>
    <body>
        <h1>Bienvenue à TravelCar!</h1>
        <?php
        $time_debut = $_GET["date_debut"];
        $time_debut .= " " . $_GET["time_debut"] . ":00";
        $time_fin = $_GET["date_fin"];
        $time_fin .= " " . $_GET["time_fin"] . ":00";
        $info = array();
        $info["aeroport"] = $_GET["lieu"];
        $info["time_debut"] = $time_debut;
        $info["time_fin"] = $time_fin;
        $result = reserver_search($info, $_GET["option"]);
        if ($result == false) {
            echo ("Aucune résultat");
        } else {
            echo ("<div class='boite_key'>");
            foreach (array_keys($result[0]) as $key) {
                echo("<div class='boite_arrange'>");
                echo($key);
                echo("</div>");
            }
            echo ("</div>");
            echo ("<div class='boite_key'>");
            foreach ($result as $value) {
                $tmp = $value['label'];
            ?>

        <a href='#'  class='car' onclick="popup('<?php echo $tmp ?>')">

    <?php
                foreach ($value as $valeur) {
                    echo("<div class='boite_arrange'>");
                    echo($valeur);
                    echo("</div>");
                }
                ?>
         </a>
<?php
                echo ("<br>");
            }
            echo ("</div>");
        }
        ?>
<!--      <a href='#'    id ='hahha' class="car">button</a>-->

    </body>
    <script>
        function popup(e){
            var n_plaque = confirm("Vous êtes sûr ?");
            if(n_plaque){
               window.location.href = 'submit_require';
            }
            
        }
//       
//            $(".car").on('click', function(e){
////                var a = "<?php echo  "" ?>";
//                
////                 var n_plaque = prompt("Veuillez entrer votre numéro de plaque", "");
//                 
//  });


//        var app = angular.module('myApp', ['ngDialog']);
//        app.controller('car', function ($scope, ngDialog) {
//            $scope.open = function (park_label) {
//                ngDialog.open({
//                    template:'<div class="ngdialog-message">'+
//	'<h2>Native Angular.js solution</h2>'+
//		'</div>'+
//		'<div class="ngdialog-buttons mt">'+
//		'<button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="next()">confirm</button>'+
//			'</div>'
//                    plain:true
//                    //controller: 'FirstDialogCtrl',
//                    //className: 'ngdialog-theme-default ngdialog-theme-custom'
//                });
//
//            };
//        });

        //var app = angular.module('myApp',[]);
        //app.controller('car', function ($scope) {
        //    
        //    $scope.open = function () {
        //        alert("fafaf");
        //    };
        //    
        //})
    </script>
</html>