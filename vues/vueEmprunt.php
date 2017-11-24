<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
            <?php
                $formulaireRechercheStation->afficherFormulaire();
            ?>
    </div>
    <div class="tabStations">
        <?php
            echo tabStation($lesStations, $entete,"tabStations");
        ?>
    </div>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>
</div>
