<?php ob_start();?>

<table class="table">
            <!-- entete du tableau -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Etage</th>
                    <th scope="col">Intervention</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <!-- corps du tableau -->
            <tbody>
                <!-- On crée la requête qui nous permet de récupérer toutes les interventions -->
                <?php

        foreach($listing as $ligne){
            echo "<tr scope='row'>";
                echo "<td><b>".$ligne['id_int']."</b></td>";
                echo "<td>".$ligne['date_int']."</td>";
                echo "<td>".$ligne['step_int']."</td>";
                echo "<td>".$ligne['name_int']."</td>";
                echo "<td><a href='?action=modifier&id=".$ligne['id_int']."&date=".$ligne['date_int']."&etage=".$ligne['step_int']."&intervention=".$ligne['name_int']."'>modifier</a> - <a href='?action=supprimer&id=".$ligne['id_int']."'>Supprimer</a></td>";
            echo "</tr>";

        }

        

    ?>

            </tbody>
        </table>

        <?php 
        
        $contenuAafficher =  ob_get_clean();
        require_once 'views/template.php'; ?>

