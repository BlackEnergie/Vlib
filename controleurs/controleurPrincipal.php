<?php
// appel de tous les fichiers nécessaire
require_once 'fonctions/menu.php';
require_once 'fonctions/formulaire.php';
require_once 'fonctions/dispatcher.php';
require_once 'modeles/dto/abonne.php';
require_once 'modeles/dto/responsable.php';
require_once 'modeles/dao/dao.php';
require_once 'fonctions/fonctions.php';



// verifie si il y a deja un menu principal et lui affecte la valeur selectionné
if (isset($_GET['vlibMP'])){
    $_SESSION['vlibMP']= $_GET['vlibMP'];
}
// sinon affecte au menu principal la valeur par defaut
else{
    if(!isset($_SESSION['vlibMP'])){
        $_SESSION['vlibMP']="accueil";
    }
}

if (isset($_GET['ListeStations'])){
    $_SESSION['ListeStations']= $_GET['ListeStations'];
}
else{
    if(!isset($_SESSION['ListeStations'])){
        $_SESSION['ListeStations']="";
    }
}

// *****verifie si le login et le mdp inséré correspond a un abonné existant
// dans la bas de donnee, si il existe, il se connecte et est redirigé a l'accueil
// sinon son mdp ou login est incorrect et reste sur la page******
$messageErreurConnexion= '';
if (isset($_POST['login'],$_POST['mdp'])){
    $unAbonne =new abonne($_POST['login']);
    $_SESSION['identification']=abonneDAO::verification($unAbonne);
    $_SESSION['abonne'] = $unAbonne;

    if($_SESSION['identification']){
        $_SESSION['vlibMP']='accueil';
    }
    else{
        $unResponsable =new responsable($_POST['login']);
        $_SESSION['identificationResp']=responsableDAO::verification($unResponsable);

        if($_SESSION['identificationResp']) {
            $_SESSION['vlibMP'] = 'accueil';
        }
        else{
            $messageErreurConnexion='Login ou mot de passe incorrect';
        }
    }
}


////////////////////////////////////////////////////////////
//////////
////////// Charge les abonnements dans un variable de session
/// $_SESSION['abonnements'][0] --> 1an
/// $_SESSION['abonnements'][1] --> 1mois
/// $_SESSION['abonnements'][2] --> 24h
//////////
////////////////////////////////////////////////////////////
if(!isset($_SESSION['abonnements'])){
    $_SESSION['abonnements'] = AbonnementsDAO::lesAbonnements();
}

if (isset($_GET['numStationD'])){
    $_SESSION['vlibMP'] = 'Deposer';
    $_SESSION['NumStation'] = $_GET['numStationD'];
}

if (isset($_GET['numStationE'])){
    $_SESSION['vlibMP'] = 'Emprunter';
    $_SESSION['NumStation'] = $_GET['numStationE'];
}

//************ cree un nouveau menu principal***********
$vlibMP = new Menu("menuPrincipal");


$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));


//********* verifie si l'abonne est connecté
// il affiche des onglets supplémentaire concernant l'abonne**********
if (isset($_SESSION['identification'])){
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("gestion", "Gestion des vélos"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("MonCompte", "Mon compte"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("deconnexion", "Se deconnecter"));
}
elseif (isset($_SESSION['identificationResp'])){
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("maintenanceStation", "MaintenanceStation"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("maintenancePlot", "MaintenancePlot"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("maintenanceVelo", "MaintenanceVelo"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("deconnexion", "Se deconnecter"));
}
else {
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("AbonnementsEtTarifs", "Abonnements et tarifs"));
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("conditions", "Conditions d'utilisation"));
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("connexion", "Se connecter"));
}
//*********** crée le menu principal
$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

include_once dispatcher::dispatch($_SESSION['vlibMP']);

?>
