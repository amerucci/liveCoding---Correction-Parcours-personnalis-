<?php ob_start();?>
<form method="GET">
            <input type="date" name="date">
            <input type="number" name="etage">
            <input type="text" name="intervention">
            <input type="submit" name='action' value="ajouter"> <!-- ?action=ajouter -->

        </form>

        <?php
 $contenuAafficher =  ob_get_clean();
 require_once 'views/template.php'; ?>

