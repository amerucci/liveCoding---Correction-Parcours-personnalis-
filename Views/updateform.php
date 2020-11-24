<?php ob_start();?>

<form method="GET">
<input type="hidden" name="id" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['id'];
} ?>">
<div class="form-group">
    <label for="labelforDate">Date</label>
    <input type="date" class="form-control" name="date" aria-describedby="dateHelp"  value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['date'];
} ?>">
    <small id="dateHelp" class="form-text text-muted">Saisir la date de l'intervention</small>
  </div>
  <div class="form-group">
    <label for="labelforEtage">Etage</label>
    <input type="number" class="form-control" name="etage" aria-describedby="dateHelp" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['etage'];
} ?>">
    <small id="dateHelp" class="form-text text-muted">Saisir l'étage auquel s'est passé l'intervention</small>
  </div>
  <div class="form-group">
    <label for="labelforIntervention">Intervention</label>
 
    <input type="text" name="intervention" class="form-control" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['intervention'];
} ?>">


    <small id="dateHelp" class="form-text text-muted">Saisir l'intervention</small>
  </div>
           
      
           
            <input type="submit" name='action' value="valider" class="btn btn-primary"> <!-- ?action=ajouter -->

        </form>





<?php
$contenuAafficher =  ob_get_clean();
require_once 'views/template.php'; ?>

