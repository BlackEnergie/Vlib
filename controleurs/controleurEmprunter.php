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
$formulaireEmprunter->ajouterComposantLigne($formulaireEmprunter->creerInputSubmit("emprunterVelo","emprunterVelo", "Emprunter" ));
$formulaireEmprunter->ajouterComposantTab();

$formulaireEmprunter->creerFormulaire();

include_once 'vues/vueEmprunter.php';