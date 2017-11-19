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
        if(isset($_POST['rechercheStation'])){
            $lesStations = StationDAO::rechercher($_POST['rechercheStation']);
            $entete = array();
            $entete[0] = "Numéro Station";
            $entete[1] = "Nom";
            $entete[2] = "Capacité";
            echo tableauHtml($lesStations, $entete, "" , "", "");
        }
        else{
            $lesStations = StationDAO::rechercher("");
            $entete = array();
            $entete[0] = "Numéro Station";
            $entete[1] = "Nom";
            $entete[2] = "Capacité";
            echo tableauHtml($lesStations, $entete, "" , "", "");
        }
        ?>
    </div>
        <div id="bas">
            <?php  include 'bas.php' ;?>
        </div>
</div>
