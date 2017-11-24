<?php


//codeacces sera la concaténation du num de telephone qu'il faudra crypté en mp5 lors de l'insertion
//dans la base de données

//création du formulaire d'inscription

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscript', 'fInscript');

$formulaireInscription -> ajouterComposantLigne($formulaireInscription->creerLabelFor('civilité','Civilité'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','monsieur','M.'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','madame','Mme'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputRadio('civilite','mademoiselle','Mlle'));
$formulaireInscription->ajouterComposantTab();

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


// formulaire de choix du code d'acces (pour se connecter a l'espace abonné)


$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mdp', 'Code secret * (codes à 4 chiffres)'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp', 'mdp', '', '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('confirmationmdp', 'Confirmation du code secret'));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('confirmationmdp', 'confirmationmdp', '', '', 0));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('inscription',"inscription","Valider"));
$formulaireInscription->ajouterComposantTab();
$formulaireInscription->creerFormulaire();

 include_once 'vues/inscription.php';
