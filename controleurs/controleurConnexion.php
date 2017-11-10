<?php

<<<<<<< HEAD
if(!isset($_SESSION['vlibMP']) || !$_SESSION['vlibMP'])
{
=======
>>>>>>> e2b67a49fff79c84b7fbf2ccd46a6d5c3835faee

if(!isset($_SESSION['identifiant']) || !$_SESSION['identifiant'])
{

$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
<<<<<<< HEAD
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, '', 0), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputPass('mdp', 'mdp', '', 1, '', 0), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'), 2);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"), 2);
=======
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, '', 0));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp', '', 1, ''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor($messageErreurConnexion, "messageErreurConnexion"));
>>>>>>> e2b67a49fff79c84b7fbf2ccd46a6d5c3835faee
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

include_once 'vues/squeletteConnexion.php';

}

else{
<<<<<<< HEAD
    $_SESSION['identification'] = array();
    $_SESSION['vlibMP'] = "equipeC";
=======
    $_SESSION['identifiant'] = array();
    $_SESSION['vlibMP'] = "accueil";
>>>>>>> e2b67a49fff79c84b7fbf2ccd46a6d5c3835faee
    header('location: index.php');
}

?>
