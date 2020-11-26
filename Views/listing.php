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
                echo "<td> 
                <div class='row'>
                <div class='col-12 col-md-6 p-0 m-0'>
                <button type='button' class='btnModal btn btn-warning btn-sm' data-toggle='modal'
                data-id_int='".$ligne['id_int']."'
                data-date_int='".$ligne['date_int']."'
                data-step_int='".$ligne['step_int']."'
                data-name_int='".$ligne['name_int']."'
                data-target='#exampleModal'>
  Modifier
</button>


                </div>
                <div class='col-12 col-md-6  p-0 m-0'>

                <button type='button' class='btnSupModal btn btn-danger btn-sm' data-toggle='modal'
                data-id_int='".$ligne['id_int']."'
                data-date_int='".$ligne['date_int']."'
                data-step_int='".$ligne['step_int']."'
                data-name_int='".$ligne['name_int']."'
                data-target='#exampleModal'>
  Supprimer
</button>


                
                </div>
                
                </div>
               
                
               
                
                </td>";
            echo "</tr>";

        }

        

    ?>

            </tbody>
        </table>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msgInfo"></div>
      <div id="formulaire"></div>
      
          


      </div>
    
    </div>
  </div>
</div>

        <?php 
        
        $contenuAafficher =  ob_get_clean();
        require_once 'views/template.php'; ?>
