<?php

require_once 'fonctions/menu.php';
require_once 'fonctions/formulaire.php';
require_once 'fonctions/dispatcher.php';



if(isset($_GET['vlibMP'])){
    $_SESSION['vlibMP']= $_GET['vlibMP'];
}
else
{
    if(!isset($_SESSION['vlibMP'])){
        $_SESSION['vlibMP']="accueil";
    }
}

$vlibMP = new Menu("vlibMP");
$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("services", "Services"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("locaux", "Locaux"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("ligues", "Ligues"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("contact", "Contact"));


$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

<<<<<<< HEAD
=======

>>>>>>> 0d483c0f1a0df5556ad399ff80fe4b8c4b2556bb
