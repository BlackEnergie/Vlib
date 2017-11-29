<?php

include_once 'modeles/dto/stations.php';

$laStation = StationDAO::rechercherID($_SESSION['NumStation']);
$lesVelosStation = VeloDAO::lesVelosStation($laStation->getNUMS());

$formulaireEmprunter = new Formulaire('post', 'index.php', 'emprunter', 'formEmprunt');

$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId('Emprunter un vélo', "titre"));
$formulaireEmprunter->ajouterComposantTab();
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId($laStation->getNOMS(), "station"));
$formulaireEmprunter->ajouterComposantTab();
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId("Vélos disponibles :", "text"));
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerSelectVelos("selectVelo","selectVelo" ,$lesVelosStation));
$formulaireEmprunter->ajouterComposantTab();
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerInputMdp("codeSecret", "codeSecret", 1, "Code Secret", ""));
$formulaireEmprunter->ajouterComposantTab();
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerInputSubmit("emprunterVelo","emprunterVelo", "Emprunter" ));
$formulaireEmprunter->ajouterComposantTab();


//////////////////////////////////////////////////////////////////////////////
/// Récupère l'heure actuelle
//////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('Europe/Paris');
$now=time();
$date = date('Y-m-d');
$heure = date('H:i',$now);
$res = null;

if(isset($_POST['emprunterVelo'])){
    $verif = AbonneDAO::verificationEmprunt($_SESSION['abonne']);
    if(!is_null($verif)){
        $res = louerDAO::louerVelo($_POST['selectVelo'], $_SESSION['abonne']->getCODEACCES(), $_SESSION['NumStation'], $_POST['codeSecret'], $date, $heure);
    }

}

if(isset($_POST['emprunterVelo']) && ($res == 1)){
    $formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId("Emprunt effectué ", "ok"));
    $formulaireEmprunter->ajouterComposantTab();
    $formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId("Vélo n°" . $_POST['selectVelo'], ""));
    $formulaireEmprunter->ajouterComposantTab();
} elseif(isset($_POST['emprunterVelo']) && ($res == 0)){
    $formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabelId("Echec de l'emprunt", "echec"));
    $formulaireEmprunter->ajouterComposantTab();
}

$formulaireEmprunter->creerFormulaire();

include_once 'vues/vueEmprunter.php';