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

$vlibMP = new Menu("menuPrincipal");
$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("tarifs", "Tarifs"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("conditions", "Conditions d'utilisation"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("connection", "Se connecter"));


$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

