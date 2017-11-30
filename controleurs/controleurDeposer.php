<?php

include_once 'modeles/dto/stations.php';

$lesStations = StationDAO::lesStations();
$laStation = stations::chercher($lesStations , $_SESSION['NumStation']);
$lesPlotsDispo = StationDAO::plotsDiponiblesStation($laStation);

$formulaireDeposer = new Formulaire('post', 'index.php', 'deposer', 'formEmprunt');

$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId('Déposer mon vélo', "titre"));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId($laStation->getNOMS(), "station"));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Vélos empruntés :", "text"));
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerSelectVelos("selectVelo","selectVelo" ,$_SESSION['abonne']->getVELOS()));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Plots disponibles :", "text"));
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerSelectVelos("selectVelo","selectVelo" ,$lesPlotsDispo));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerInputSubmit("deposerVelo","deposerVelo", "Déposer" ));
$formulaireDeposer->ajouterComposantTab();

//////////////////////////////////////////////////////////////////////////////
/// Récupère l'heure actuelle
//////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('Europe/Paris');
$now=time();
$date = date('Y-m-d');
$heure = date('H:i',$now);
$res = null;

if(isset($_POST['deposerVelo'])){
    $verif = AbonneDAO::verificationEmprunt($_SESSION['abonne']);
    if(!is_null($verif)){
        $res = louerDAO::louerVelo($_POST['selectVelo'], $_SESSION['abonne']->getCODEACCES(), $_SESSION['NumStation'], $_POST['codeSecret'], $date, $heure);
    }
}


$formulaireDeposer->creerFormulaire();

include_once 'vues/vueDeposer.php';