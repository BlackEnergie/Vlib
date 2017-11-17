<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="contentRecherche">
            <img src="images/vlib.jpg" class="vlib"/>
            <?php $formulaireRechercheStation->afficherFormulaire() ;?>
        </div>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
