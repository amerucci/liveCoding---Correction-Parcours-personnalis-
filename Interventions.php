<?php

require_once 'Database.php';

class Intervention extends Database
{
    public function delete(){
        $supprimer = $this->connect()->prepare('DELETE From interventions WHERE id_int=:id');
        $supprimer->bindParam(':id', $_GET['id']);
        $supprimer->execute();
     }
    
     public function update(){
        $modifier = $this->connect()->prepare('UPDATE interventions SET date_int = :date, step_int=:etage, name_int=:intervention WHERE id_int = :id');
        $modifier->bindParam(':date', $_GET['date']);
        $modifier->bindParam(':etage', $_GET['etage']);
        $modifier->bindParam(':intervention', $_GET['intervention']);
        $modifier->bindParam(':id', $_GET['id']);
        $modifier->execute();
     }
    
     public function add(){
          //On prépare notre requete d'insertion
        $ajouter = $this->connect()->prepare('INSERT INTO interventions ( date_int, step_int, name_int) VALUES (:date, :step, :name)'); //ON prépare la requete
        $ajouter->bindParam(':date', $_GET['date']); //On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->bindParam(':step', $_GET['etage']);//On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->bindParam(':name', $_GET['intervention']);//On associe nos paramètre aux champs envoyés par le formulaire
        $ajouter->execute(); //On exécute la requête
     }

    public function all(){
        $interventions = $this->connect()->prepare('SELECT * FROM interventions');
        $interventions->execute();
        $int = $interventions->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $int;
    }



    
    
}
