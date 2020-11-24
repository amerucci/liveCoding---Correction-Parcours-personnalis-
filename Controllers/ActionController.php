<?php

require_once 'Models/Interventions.php';

function actionUpdate(){
    require_once 'views/updateform.php';
    
}

function actionAdd(){
    require_once 'views/addform.php';

}

function listing(){
    $listing = new Intervention;
    $listing = $listing->all();
    require_once 'views/listing.php';
}

function update(){
    $update = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $update->update(); // On appelle la méthode Update dans notre objet
    listing();
}

function delete(){
    $delete = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $delete->delete(); // On appelle la méthode Update dans notre objet
    listing();
}

function add(){
    $add = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $add->add(); // On appelle la méthode Update dans notre objet
  listing();
}

function search(){
    $search = new Intervention(); // Je crée mon objet qui utilise la class Intervention
    $listing = $search->search(); // On appelle la méthode Update dans notre objet
    require_once 'views/listing.php';
}
