<?php
include 'fragmentHeader.html';
?>
<body>
<div class="container">
    <?php
        include 'fragmentMenu.html';
    ?>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Travel Car</h3>
        </div>
    </div>
    <div class="jumbotron">
        <h1>  Welcome <?php echo($_SESSION['id']);?> !</h1>
        <p>  Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if ($results) {
        echo ("<h2>Inscription est fait !</h2>");
//        $_SESSION['id'] = 
//        echo ("<h3>id = " . $_COOKIE['id'] . "</h3>");
    } else {
        echo ("<h2>Il y a  un problème pour l'inscription</h2>");
        echo ("<h3>id = " . $_SESSION['id'] . "</h3>");
    }
    include('fragmentFooter.html');
    ?>
</div>