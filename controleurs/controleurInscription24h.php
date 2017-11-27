<?php
// création du formulaire d'inscription et du code secret  pour un abonnement 24h (post indique que les données seront recupérées)

$formulaireInscription24h = new Formulaire('post', 'index.php','fInscript24h','fInscript24h');

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('numero', 'Votre numéro de téléphone*'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('numero', 'numero', '', 1, '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('email', 'Email *'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('email', 'email', '',1, '', 0));
$formulaireInscription24h->ajouterComposantTab();


$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('mdp', 'Code secret * (codes à 4 chiffres)'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputMdp('mdp', 'mdp', '', '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('confirmationmdp', 'Confirmation du code secret'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputMdp('confirmationmdp', 'confirmationmdp', '', '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputSubmit('inscription24h',"inscription24h","Valider"));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->creerFormulaire();

if (isset($_POST['numero'])) {
$_SESSION['numero']=$_POST['numero'];
$_SESSION['email']=$_POST['email'];
$_SESSION['mdp']=$_POST['mdp'];

AbonneDAO::insertAbonne(mt_rand(1000, 9999),$_SESSION['mdp'],"AAA",NULL,NULL,date("d-m-y"),NULL,NULL,NULL);

}

include_once 'vues/inscription24h.php'
 ?>
