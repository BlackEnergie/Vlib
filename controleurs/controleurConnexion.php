<?php
/**
 * Created by PhpStorm.
 * User: ibenbadda
 * Date: 10/11/2017
 * Time: 13:49
 */

class controleurConnexion
{
<?php

if(!isset($_SESSION['vlibMP']) || !$_SESSION['vlibMP']){


$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', ''   , 1, '',0),1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputPass('mdp', 'mdp', '' ,1, '', 0),1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'),2);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"),2);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

include_once 'vues/squeletteConnexion.php';

}
else{
    $_SESSION['identification']=array();
    $_SESSION['vlibMP']="equipeC";
    header('location: index.php');
}
?>
}