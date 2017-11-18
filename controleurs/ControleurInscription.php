<?php

//création du formulaire d'inscription (post indique que les données seront recupérées)

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscript', 'fInscript');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('identifiant', 'Identifiant :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('login', 'login', '', 1, '', 0), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mdp', 'Mot de passe :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp', 'mdp', '', 1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'), 2);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel($messageErreurConnexion, "messageErreurConnexion"), 2);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->creerFormulaire();

 include_once 'vues/Accueil.php';
