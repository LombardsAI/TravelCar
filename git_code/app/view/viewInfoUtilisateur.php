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
        <h1>Welcome <?php echo($_COOKIE['id']);?> !</h1>
        <p>Maximaliser le valeur de vos voitures ....</p>
    </div>
    <?php
    if(!empty($results)){
        echo "<table class = 'table table-striped table-bordered'>"
            . "<thead>
        <tr>
            <th scope = 'col'>ID</th>
            <th scope = 'col'>Nom</th>
            <th scope = 'col'>Prenom</th>
            <th scope = 'col'>Telephone</th>
            <th scope = 'col'>adress_mail</th>
        </tr>
        </thead>
        <tbody>";
//   $info_url = '';
//      foreach($info as $key=>$value){
//      $info_url.=$key.'='.$value.'&';
//  }
//        $str=json_encode($info);

        // La liste des vins est dans une variable $results
        foreach ($results as $mv) {

//   $info_label = array();

            printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><a href='Mailto:%s'>%s</a></td></tr>",
                $mv->getId(), $mv->getNom(),$mv->getPrenom(), $mv->getTelephone(), $mv->getAdMail(),$mv->getAdMail());

        }

    }
    else {
        echo "Désolé, il n'y a pas ce utilisateur";
    }

    ?>
    </tbody>
    </table>
</div>
<?php include 'fragmentFooter.html'; ?>
