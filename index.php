<?php

require_once 'Controllers/ActionController.php';

if(isset($_GET['action']) && $_GET['action']=="modifier"){
    actionUpdate();
}
else if(isset($_GET['action']) && $_GET['action']=="valider"){
    update();
 }
 else if(isset($_GET['action']) && $_GET['action']=="supprimer"){
    delete();
 }
 else if(isset($_GET['action']) && $_GET['action']=="add"){
    actionAdd();
 }
 else if(isset($_GET['action']) && $_GET['action']=="ajouter"){
    add();
 }
else{
    listing();
}