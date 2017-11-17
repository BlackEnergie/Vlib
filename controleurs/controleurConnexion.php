<?php


//création du formulaire de connexion (post indique que les données seront recupérées)

$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'connexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, '', 0), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp', '', '', 0), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'), 2);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"), 2);
$formulaireConnexion->ajouterComposantTab();
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLien('controleurs/controleurInscription.php','Pas encore inscrit ? cliquez ici!'));
$formulaireConnexion->ajouterComposantTab();
$formulaireConnexion->creerFormulaire();


//***** inclut la vue html de la page connexion
include_once 'vues/squeletteConnexion.php';

?>
