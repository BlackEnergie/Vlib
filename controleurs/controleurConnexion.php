<?php


if(!isset($_SESSION['identifiant']) || !$_SESSION['identifiant'])
{

$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, '', 0));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp', '', 1, ''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor($messageErreurConnexion, "messageErreurConnexion"));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

include_once 'vues/squeletteConnexion.php';

}

else{
    $_SESSION['identifiant'] = array();
    $_SESSION['vlibMP'] = "accueil";
    header('location: index.php');
}

?>
