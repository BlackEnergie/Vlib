<?php

/*
crer 3 checkbox :
- abonnement 24h
- abonnement 1 mois
- abonnement 1 an

si abonnement 24h = true alors formulairefinal=formulaireInscription24h sinon
si abonnement 1 mois ou abonnement 1an = true alors formulairefinal=formulaireInscription
fin si

afficher formulaire de choix du code codeSecret

codeacces sera la concaténation du num de telephone qu'il faudra crypté en mp5 lors de l'insertion
dans la base de données


*/

// création du formulaire d'inscription pour un abonnement 24h (post indique que les données seront recupérées)

$formulaireInscription24h = new Formulaire('post', 'index.php','fInscript24h','fInscript24h');

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('numero', 'Votre numéro de téléphone*'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('numero', 'numero', '', 1, '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerLabelFor('email', 'Email *'));
$formulaireInscription24h->ajouterComposantLigne($formulaireInscription24h->creerInputTexte('email', 'email', '', 1, '', 0));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription24h->creerFormulaire();

//création du formulaire d'inscription

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscript', 'fInscript');

$formulaireInscription -> ajouterComposantLigne($formulaireInscription->creerLabelFor('civilité','Civilité'));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','monsieur','M.'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','madame','Mme'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','mademoiselle','Mlle'));
$formulaireInscription24h->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('nom', 'Nom *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom', 'nom', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('prenom', 'Prénom *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('datenaissance', 'Date de naissance *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('datenaissance', 'datenaissance', '', 1, '', 0));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('formatdtn','(jj/mm/aaaa)'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('numerovoie', 'N° et libellé de voie'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('numerovoie', 'numerovoie', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('complementdest', 'Complément destinataire'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('complementdest', 'complementdest', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('detail','(N° appart, Escalier, Couloir, Etages,...)'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('complementgeo', 'Complément géographique'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('complementgeo', 'complementgeo', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('detail2','(Entrée, Tour, Bâtiment, Résidence)'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('cdp', 'Code postal *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('cdp', 'cdp', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('ville', 'Ville *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('ville', 'ville', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('detail3','Vous devez remplir au moins une des trois données ci-dessous.'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('detail4','ces données seront utilisées pour vous envoyé vos formation personnelles'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('detail4Suite','liée au service Vlib'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('email', 'Email *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('email', 'email', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('confirmationemail', 'confirmation de l\'email *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('confirmationemail', 'confirmationemail', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mobile', 'Mobile *'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('mobile', 'mobile', '', 1, '', 0));
$formulaireInscription->ajouterComposantTab();


$formulaireInscription->creerFormulaire();

// formulaire de choix du code d'acces (pour se connecter a l'espace abonné)

$formulaireCodeSecret = new Formulaire('post', 'index.php','fCodeSecret','fCodeSecret');

$formulaireCodeSecret->ajouterComposantLigne($formulaireCodeSecret->creerLabelFor('mdp', 'Code secret * (codes à 4 chiffres)'));
$formulaireCodeSecret->ajouterComposantLigne($formulaireCodeSecret->creerInputMdp('mdp', 'mdp', '', '', 0));
$formulaireCodeSecret->ajouterComposantTab();

$formulaireCodeSecret->ajouterComposantLigne($formulaireCodeSecret->creerLabelFor('confirmationmdp', 'Confirmation du code secret'));
$formulaireCodeSecret->ajouterComposantLigne($formulaireCodeSecret->creerInputMdp('confirmationmdp', 'confirmationmdp', '', '', 0));
$formulaireCodeSecret->ajouterComposantTab();

$formulaireCodeSecret->creerFormulaire();

 include_once 'vues/inscription.php';
