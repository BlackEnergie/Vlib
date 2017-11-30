
<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="vueEmprunt">
        <label id="titre">Bonjour
            <?php
                echo $_SESSION['abonne']->getCODEACCES();
            ?>
            !</label><br>
        <label id="text">
            <?php
                echo "Vous possédez " . count($_SESSION['abonne']->getVELOS()) . " vélos<br />";
                foreach ($_SESSION['abonne']->getVELOS() as $VELO){
                    echo $VELO->getNUMV() . "<br />";
                }
            ?>
        </label>
        </div>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
</div