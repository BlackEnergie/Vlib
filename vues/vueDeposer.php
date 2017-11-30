<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="vueEmprunt">
            <?php
                $formulaireDeposer->afficherFormulaire();
            ?>
        </div>
    </div>

    <div id="bas">
        <?php  include 'bas.php' ;?>
    </div>
</div>