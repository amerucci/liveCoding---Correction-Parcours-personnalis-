<?php
//On crée la connexion à la base de données
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

 function delete(){
    $supprimer = connect()->prepare('DELETE From interventions WHERE id_int=:id');
    $supprimer->bindParam(':id', $_GET['id']);
    $supprimer->execute();
 }

 function update(){
    $modifier = connect()->prepare('UPDATE interventions SET date_int = :date, step_int=:etage, name_int=:intervention WHERE id_int = :id');
    $modifier->bindParam(':date', $_GET['date']);
    $modifier->bindParam(':etage', $_GET['etage']);
    $modifier->bindParam(':intervention', $_GET['intervention']);
    $modifier->bindParam(':id', $_GET['id']);
    $modifier->execute();
 }

 function add(){
      //On prépare notre requete d'insertion
    $ajouter = connect()->prepare('INSERT INTO interventions ( date_int, step_int, name_int) VALUES (:date, :step, :name)'); //ON prépare la requete
    $ajouter->bindParam(':date', $_GET['date']); //On associe nos paramètre aux champs envoyés par le formulaire
    $ajouter->bindParam(':step', $_GET['etage']);//On associe nos paramètre aux champs envoyés par le formulaire
    $ajouter->bindParam(':name', $_GET['intervention']);//On associe nos paramètre aux champs envoyés par le formulaire
    $ajouter->execute(); //On exécute la requête
 }