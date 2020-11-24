<?php ob_start();?>
<form method="GET">

<div class="form-group">
    <label for="labelforDate">Date</label>
    <input type="date" class="form-control" name="date" aria-describedby="dateHelp">
    <small id="dateHelp" class="form-text text-muted">Saisir la date de l'intervention</small>
  </div>
  <div class="form-group">
    <label for="labelforEtage">Etage</label>
    <input type="number" class="form-control" name="etage" aria-describedby="dateHelp" min="0" max="10">
    <small id="dateHelp" class="form-text text-muted">Saisir l'étage auquel s'est passé l'intervention</small>
  </div>
  <div class="form-group">
    <label for="labelforIntervention">Intervention</label>
    <input type="text" name="intervention" class="form-control" >
    <small id="dateHelp" class="form-text text-muted">Saisir l'intervention</small>
  </div>
           
      
           
            <input type="submit" name='action' value="ajouter" class="btn btn-primary"> <!-- ?action=ajouter -->

        </form>

        <?php
 $contenuAafficher =  ob_get_clean();
 require_once 'views/template.php'; ?>

