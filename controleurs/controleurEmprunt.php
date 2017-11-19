<?php


$formulaireRechercheStation = new Formulaire('post', 'index.php', 'fRechercheStation', '');

$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerLabelFor('rechercher',"Rechercher une station"));
$formulaireRechercheStation->ajouterComposantTab();
$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputTexte('rechercheStation', 'rechercheStation', '', 0, 'Rechercher une station', 0));
$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputSubmit('recherche', 'recherche', 'Rechercher'));
$formulaireRechercheStation->ajouterComposantTab();



if(isset($_POST['rechercheStation'])){
    $lesStations = StationDAO::rechercher($_POST['rechercheStation']);
    tableauHtml($lesStations, "tabStations", "" , "");
}

$formulaireRechercheStation->creerFormulaire();


include_once "vues/vueEmprunt.php";