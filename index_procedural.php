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
 
 function connect() //fonction de connextion à la base
 {
     try
     {
         $bdd = new PDO('mysql:host=localhost;dbname=conciergerie;port=3306;charset=utf8', 'root', '');
        return $bdd; 
      
     }
     catch(Exception $e)
     {
         die('Erreur : '.$e->getMessage());
     }
 }


 //Suppression
if(isset($_GET['action'])&&$_GET['action']=="supprimer"){
    $supprimer = connect()->prepare('DELETE From interventions WHERE id_int=:id');
    $supprimer->bindParam(':id', $_GET['id']);
    $supprimer->execute();
    //On génrère la redirecition
    echo "<script>window.location = './index_procedural.php';</script>";

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
    $modifier = connect()->prepare('UPDATE interventions SET date_int = :date, step_int=:etage, name_int=:intervention WHERE id_int = :id');
    $modifier->bindParam(':date', $_GET['date']);
    $modifier->bindParam(':etage', $_GET['etage']);
    $modifier->bindParam(':intervention', $_GET['intervention']);
    $modifier->bindParam(':id', $_GET['id']);
    $modifier->execute();
    echo "<script>window.location = './index_procedural.php';</script>";
}
?>


        <!-- Requête d'ajout d'une intervention -->
        <?php
if(isset($_GET['action']) && $_GET['action']=="ajouter"){
        //On prépare notre requete d'insertion
        $ajouter = connect()->prepare('INSERT INTO interventions ( date_int, step_int, name_int) VALUES (:date, :step, :name)'); //ON prépare la requete
        $ajouter->bindParam(':date', $_GET['date']); //On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->bindParam(':step', $_GET['etage']);//On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->bindParam(':name', $_GET['intervention']);//On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->execute(); //On exécute la requête
        echo "<script>window.location = './index_procedural.php';</script>";
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
        $interventions = connect()->prepare('SELECT * FROM interventions');
        $interventions->execute();
        $int = $interventions->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        foreach($int as $ligne){
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