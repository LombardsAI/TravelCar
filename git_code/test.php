<?php

$sql = "SELECT aeroport, p.label, prix_par_heure as prix, adresse FROM parking p LEFT JOIN"
                    . "(SELECT count(*) as num, label_du_parking as label FROM gare g WHERE "
                    . "(unix_timestamp(g.date_debut) > unix_timestamp('" . $info["date_debut"] . "') AND "
                    . "unix_timestamp(g.date_debut) < unix_timestamp('" . $info["date_fin"] . "') ) OR "
                     . "(unix_timestamp(g.date_fin) > unix_timestamp('" . $info["date_debut"] . "') AND "
                    . "unix_timestamp(g.date_fin) < unix_timestamp('" . $info["date_fin"] . "') )"
                        . "AND g.TYPE !=-1 AND g.TYPE!=2"
                        . ")a ON "
                    . " (p.label = a.label AND "
                    . " p.nombre_max > a.num) OR (p.label NOT IN (a.label)) WHERE p.aeroport ='" . $info["aeroport"] . "'";
echo $sql;

