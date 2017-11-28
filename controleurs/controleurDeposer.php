<?php

include_once 'modeles/dto/stations.php';

$lesStations = StationDAO::lesStations();
$laStation = stations::chercher($lesStations , $_SESSION['NumStation']);

$formulaireDeposer = new Formulaire('post', 'index.php', 'deposer', 'formEmprunt');

$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabel('Déposer mon vélo'));
$formulaireDeposer->ajouterComposantTab();
$formulaireDeposer->ajouterComposantLigne($formulaireDeposer->creerLabel($laStation->getNOMS()));
$formulaireDeposer->ajouterComposantTab();

$formulaireDeposer->creerFormulaire();

include_once 'vues/vueDeposer.php';