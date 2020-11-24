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
        $interventions = $this->connect()->prepare('SELECT * FROM interventions ORDER BY date_int desc');
        $interventions->execute();
        $int = $interventions->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $int;
    }

    public function search(){
        
       

        //ICI ON FERAIT LES RECHERCHES UNES MAIS NOUS ON VEUT DU CUMULATIF
        // if(!empty($_GET['search'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE name_int LIKE "%":search"%"');
        //     $search->bindParam(':search', $_GET['search']); //On associe nos paramètre aux champs envoyés par le formulaire
    
        // }

        // if(!empty($_GET['etage'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE step_int=:step');
        //     $search->bindParam(':step', $_GET['etage']); //On associe nos paramètre aux champs envoyés par le formulaire
     
        // }

        // if(!empty($_GET['date'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE date_int=:date');
        //     $search->bindParam(':date', $_GET['date']); //On associe nos paramètre aux champs envoyés par le formulaire
     
        // }

        //ICI ON VA FAIRE DU CUMULATIF
        
        //On commence par créer deux tableaux vides
        //Un tableau qui va contenir la requete
        $req = array();
        //Un tableau qui va contenir la ou les valeurs
        $value = array();

        if(!empty($_GET['search'])){
            array_push($req, 'AND name_int LIKE "%"?"%"');
            array_push($value, $_GET['search']);
        }

        if(!empty($_GET['etage'])){
            array_push($req, 'AND step_int=?');
            array_push($value, $_GET['etage']);
        }
        if(!empty($_GET['date'])){
            array_push($req, 'AND date_int=?');
            array_push($value, $_GET['date']);
        }

        $request = implode(" ", $req);
    
        $search = $this->connect()->prepare('SELECT * FROM interventions WHERE 1=1 '.$request.'');
        $search->execute($value);
        //   var_dump ($req);
        // echo $request;
        //  var_dump ($value);
        // $search->debugDumpParams();
        $resultSearch = $search->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $resultSearch;
       

    }

    public function listOfStep(){

      


        $step = $this->connect()->prepare('SELECT step_int FROM interventions GROUP BY step_int' );
        $step->execute();
        $stepResult = $step->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $stepResult;
 
    }




    
    
}
