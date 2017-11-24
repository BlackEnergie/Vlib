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

// *****verifie si le login et le mdp inséré correspond a un abonné existant
// dans la bas de donnee, si il existe, il se connecte et est redirigé a l'accueil
// sinon son mdp ou login est incorrect et reste sur la page******
$messageErreurConnexion= '';
if (isset($_POST['login'],$_POST['mdp'])){
    $unAbonne =new abonne($_POST['login']);
    $_SESSION['identification']=abonneDAO::verification($unAbonne);

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

//************ cree un nouveau menu principal***********
$vlibMP = new Menu("menuPrincipal");


$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));


//********* verifie si l'abonne est connecté
// il affiche des onglets supplémentaire concernant l'abonne**********
if (isset($_SESSION['identification'])){
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("emprunt", "Emprunter un vélo"));
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
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("connexion", "Se connecter"));
  $vlibMP->ajouterComposant($vlibMP->creerItemLien("conditions", "Conditions d'utilisation"));
}
//*********** crée le menu principal
$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

include_once dispatcher::dispatch($_SESSION['vlibMP']);

?>
