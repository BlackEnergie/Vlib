<?php


$formulaireRechercheStation = new Formulaire('post', 'index.php', 'fRechercheStation', 'contentRecherche');

$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputTexte('rechercheStation', 'rechercheStation', '', 0, 'Rechercher une station', 0));
$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputSubmit('recherche', 'recherche', 'Rechercher'));
$formulaireRechercheStation->ajouterComposantTab();

$formulaireRechercheStation->creerFormulaire();

include_once "vues/vueEmprunt.php";