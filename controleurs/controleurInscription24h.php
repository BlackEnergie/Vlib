<?php
// création du formulaire d'inscription et du code secret  pour un abonnement 24h (post indique que les données seront recupérées)

$formulaireInscription24h = new Formulaire('post', 'index.php','fInscript24h','fInscript24h');

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('numero', 'Votre numéro de téléphone*'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('numero', 'numero', '', 1, '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('email', 'Email *'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('email', 'email', '', 1, '', 0));
$formulaireInscription24h->ajouterComposantTab();



$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('mdp', 'Code secret * (codes à 4 chiffres)'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputMdp('mdp', 'mdp', '', '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('confirmationmdp', 'Confirmation du code secret'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputMdp('confirmationmdp', 'confirmationmdp', '', '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->creerFormulaire();
include_once 'vues/inscription24h.php'
 ?>
