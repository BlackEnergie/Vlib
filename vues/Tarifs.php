<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">

<p>Un accès vous est fourni sur une durée identique à celle de votre abonnement.
  Si vous vous abonnez occasionnellement, pour 24h, votre accès sera valable sur
   la même durée. Il en est de même pour un abonnement d'un mois ou d'un an.</p>

<form class="infos" action="index.php?vlibMP=inscription24h" method="post">


<div class="infos">

  <h3>Acces 24h</h3>

  <p>Un code d'accès associé à un code secret à 4 chiffres, ce code d'accès vous
  donne droit à un nombre illimité d'utilisation pendant 24heures ou 7 jours.
  Les 30 premières minutes sont gratuites. Si vous devez effectuer un trajet supérieur
  à 30 minutes pour un même emprunt, le coût de vos
  dépassements éventuels supérieurs à 30 minutes sera facturé à la fin de votre abonnement sur la base des tarifs en vigueur.</p>
  <input type="submit" action="x" name="btn24h" id="btn24h" value="S'abonner pour 24h">

</div>
</form>

<form class="infos" action="index.php?vlibMP=inscription" method="post">

<div class="infos">

<h3>Acces 1mois / 1an </h3>

<p>L'accès 1 mois chargé sur une carte Vlib  vous donne droit à un nombre
  illimité d'utilisation pendant un mois. Les 30 premières  minutes de chaque
  utilisation sont gratuites. Si vous devez effectuer un trajet supérieur à 30 minutes,
  le coût d'utilisation sera débité de votre crédit temps sur la base des tarifs en vigueur.
  Le crédit temps est obligatoire pour tout accès 1 mois ou 1 an et s'élève au minimum à 5€.
  Il n'est débité qu'en cas de dépassement des 30 premières minutes gratuites.</p>
  <input type="submit" name="btn1mois" id="btn1mois" value="S'abonner pour 1 mois">
</div>

<div class="infos">

<h3>Acces 1an </h3>

<p>L'accès 1 an chargé sur une carte Vlib  vous donne droit à un nombre
  illimité d'utilisation pendant un an. Les 30 premières  minutes de chaque utilisation
   sont gratuites. Si vous devez effectuer un trajet supérieur à 30 minutes,
  le coût d'utilisation sera débité de votre crédit temps sur la base des tarifs en vigueur.
  Le crédit temps est obligatoire pour tout accès 1 mois ou 1 an et s'élève au minimum à 5€.
  Il n'est débité qu'en cas de dépassement des 30 premières minutes gratuites.</p>
  <input type="submit" name="btn1an" id="btn1an" value="S'abonner pour 1 an">
</div>

</form>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
