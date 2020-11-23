<?php
require_once 'interventions.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La boite à outils du concierge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <!-- CONNEXION A LA BDD -->



    <?php
 





 //Modifier

 //Suppression
if(isset($_GET['action'])&&$_GET['action']=="supprimer"){
    $delete = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $delete->delete(); // On appelle la méthode Update dans notre objet
}


?>



    <div class="container">

        <form method="GET">
            <input type="date" name="date">
            <input type="number" name="etage">
            <input type="text" name="intervention">
            <input type="submit" name='action' value="ajouter"> <!-- ?action=ajouter -->

        </form>

        <h2>Modification</h2>


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
if(isset($_GET['action']) && $_GET['action']=="valider" ){
    $update = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $update->update(); // On appelle la méthode Update dans notre objet
 }

?>


        <!-- Requête d'ajout d'une intervention -->
        <?php
if(isset($_GET['action']) && $_GET['action']=="ajouter"){
   $add = new Intervention(); // Je crée mon objet qui utilise la class Intervention
   $add->add(); // On appelle la méthode Add dans notre objet
}

?>


        <h1>Interventions</h1>
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
                $all = new Intervention();
                $all = $all->all(); // $all = $int
        foreach($all as $ligne){
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





    </div>

</body>

</html>