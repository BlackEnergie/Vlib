<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
            <?php
            $formulaireRechercheStation->afficherFormulaire();
            ?>
    </div>
    <div class="content">
        <?php
            echo tabStation($lesStations, $entete, "", "");
        ?>
    </div>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>
</div>
