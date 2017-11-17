<?php

require_once 'fonctions/menu.php';
require_once 'fonctions/formulaire.php';
require_once 'fonctions/dispatcher.php';
require_once 'modeles/dto/abonne.php';
require_once 'modeles/dao/dao.php';

if (isset($_GET['vlibMP'])){
    $_SESSION['vlibMP']= $_GET['vlibMP'];
}

else{
    if(!isset($_SESSION['vlibMP'])){
        $_SESSION['vlibMP']="accueil";
    }
}

$messageErreurConnexion= '';
if (isset($_POST['login'],$_POST['mdp'])){
    $unAbonne =new abonne($_POST['login']);
    $_SESSION['identification']=abonneDAO::verification($unAbonne);

    if($_SESSION['identification']){
        $_SESSION['vlibMP']='accueil';
    }
    else{
        $messageErreurConnexion='Login ou mot de passe incorrect';
    }
}

$vlibMP = new Menu("menuPrincipal");

if (isset($_SESSION['identification'])&& $_SESSION['identification']){

    $vlibMP->ajouterComposant($vlibMP->creerItemLien("MonCompte", "Mon compte"));

}
$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("AbonnementsEtTarifs", "Abonnements et tarifs"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("conditions", "Conditions d'utilisation"));

if (isset($_SESSION['identification'])&& $_SESSION['identification']){
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("emprunt", "Emprunt"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("deconnexion", "Se deconnecter"));
}
else {

  $vlibMP->ajouterComposant($vlibMP->creerItemLien("connexion", "Se connecter"));
}
$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

include_once dispatcher::dispatch($_SESSION['vlibMP']);

?>
