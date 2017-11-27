<?php

include_once 'modeles/dto/stations.php';

$lesStations = StationDAO::lesStations();
$laStation = stations::chercher($lesStations , $_SESSION['NumStation']);

$formulaireEmprunter = new Formulaire('post', 'index.php', 'emprunter', 'formEmprunt');

$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabel('Emprunter un vélo'));
$formulaireEmprunter->ajouterComposantTab();
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerLabel($laStation->getNOMS()));
$formulaireEmprunter->ajouterComposantTab();

$formulaireEmprunter->creerFormulaire();

include_once 'vues/vueEmprunter.php';