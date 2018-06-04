<?php

include_once 'modeles/dto/stations.php';

$lesStations = StationDAO::lesStations();
$laStation = stations::chercher($lesStations, $_SESSION['NumStation']);
AbonneDAO::velosEmpruntes($_SESSION['abonne']);

$formulaireDeposer = new Formulaire('post', 'index.php', 'deposer', 'formEmprunt');

$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId('Déposer mon vélo', "titre"));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId($laStation->getNOMS(), "station"));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Vélos empruntés :", "text"));
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerSelectVelos("selectVelo", "selectVelo", $_SESSION['abonne']->getVELOS()));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Plots disponibles :", "text"));
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerSelectPlots("selectPlot", "selectPlot", $laStation->getPlotsDisponibles()));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerInputSubmit("deposerVelo", "deposerVelo", "Déposer"));
$formulaireDeposer->ajouterComposantTab();

//////////////////////////////////////////////////////////////////////////////
/// Récupère l'heure actuelle
//////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('Europe/Paris');
$now = time();
$date = date('Y-m-d');
$heure = date('H:i', $now);
$res = null;

if (isset($_POST['deposerVelo']) && isset($_POST['selectVelo'])) {
    $res = louerDAO::deposerVelo($_POST['selectVelo'], $_SESSION['abonne']->getCODEACCES(), $_SESSION['NumStation'], $_POST['selectPlot'], $_SESSION['NumStation']);
    if ($res == 1) {
        $formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Dépôt effectué", "ok"));
        $formulaireDeposer->ajouterComposantTab();
        $formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Vélo n°" . $_POST['selectVelo'], ""));
        $formulaireDeposer->ajouterComposantTab();
    } else {
        $formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabelId("Echec du dépôt", "echec"));
        $formulaireDeposer->ajouterComposantTab();
    }
}



$formulaireDeposer->creerFormulaire();

include_once 'vues/vueDeposer.php';