<?php
include 'fragmentHeader.html';
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
       <h1>Welcome,
       <?php     
       require_once 'check_session.php';
        ?>
                !</h1>
    </div>
    <p/>
</div>
<?php include 'fragmentFooter.html'; ?>