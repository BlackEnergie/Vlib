<?php


$formulaireRechercheStation = new Formulaire('post', 'index.php', 'fRechercheStation', 'contentRecherche');

$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputTexte('rechercheStation', 'rechercheStation', '', 0, 'Rechercher une station', 0));
$formulaireRechercheStation->ajouterComposantTab();
$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputSubmit('recherche', 'recherche', 'Rechercher'));
$formulaireRechercheStation->ajouterComposantTab();

$formulaireRechercheStation->creerFormulaire();

$entete = array();
$entete[0] = "Numéro Station";
$entete[1] = "Nom";
$entete[2] = "Capacité";

$lesStations = array();

if(isset($_POST['rechercheStation'])){
    $lesStations = StationDAO::rechercher($_POST['rechercheStation']);
} else{
    $lesStations = StationDAO::lesStations();
}


include_once "vues/vueEmprunt.php";