<?php ob_start();?>
<div class="table-responsive">
<table class="table  table-striped table-hover">
            <!-- entete du tableau -->
            <thead class="thead-dark">
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
                echo "<td>".date("d/m/Y", strtotime($ligne['date_int']))."</td>";
                echo "<td>".$ligne['step_int']."</td>";
                echo "<td>".$ligne['name_int']."</td>";
                echo "<td><a href='?action=modifier&id=".$ligne['id_int']."&date=".$ligne['date_int']."&etage=".$ligne['step_int']."&intervention=".$ligne['name_int']."' class='btn btn-warning'>Modifier</a>  <a href='?action=supprimer&id=".$ligne['id_int']."'  class='btn btn-danger'>Supprimer</a></td>";
            echo "</tr>";

        }

        

    ?>

            </tbody>
        </table>
    </div>
        <?php 
        
        $contenuAafficher =  ob_get_clean();
        require_once 'views/template.php'; ?>

