<?php ob_start();?>
<form method="GET">


<input type="hidden" name="id" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['id'];
} ?>">
<input type="date" name="date" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['date'];
} ?>">
<input type="number" name="etage" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['etage'];
} ?>">
<input type="text" name="intervention" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['intervention'];
} ?>">
<input type="submit" name='action' value="valider"> <!-- ?action=valider -->

</form>

<?php
$contenuAafficher =  ob_get_clean();
require_once 'views/template.php'; ?>

