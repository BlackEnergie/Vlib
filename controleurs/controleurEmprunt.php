<?php


$formulaireRechercheStation = new Formulaire('post', 'index.php', 'fRechercheStation', 'contentRecherche');

$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerLabel('Chercher une station'));
$formulaireRechercheStation->ajouterComposantLigne($formulaireRechercheStation->creerInputTexte('rechercheStation', 'rechercheStation', '', 1, 'Rechercher une station', 0),1);
$formulaireRechercheStation->ajouterComposantTab();

$formulaireRechercheStation->creerFormulaire();


include_once "vues/vueEmprunt.php";