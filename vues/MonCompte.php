<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php'; ?>
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
                foreach ($_SESSION['abonne']->getVELOS() as $VELO) {
                    echo $VELO->getNUMV() . "<br />";
                }
                ?>
            </label>
        </div>
        <br>
        <hr>
        <div class="vueEmprunt">
            <center>
                <label id="titre">Historique des locations</label>
                    <table class="tabStations">
                        <tr>
                            <th>Vélo</th>
                            <th>Date/Heure emprunt</th>
                            <th>Date/Heure dépôt</th>
                            <th>Temps location</th>
                            <th>Station emprunt</th>
                            <th>Station depôt</th>
                        </tr>
                        <?php
                            foreach ($locations as $location){
                                $dateHeureDepot = $location->getDateHeureDepot();
                                echo "<tr>";
                                echo "<td>" . $location->getNUMV() ."</td>";
                                echo "<td>" . $location->getDATEM() ." / " . $location->getHEURE() .  "</td>";
                                if(!is_null($dateHeureDepot)){
                                    echo "<td>" . $dateHeureDepot->format('Y-m-d / H:i:s') ."</td>";
                                    echo "<td>" . $location->getTEMPSLOC() ." minutes</td>";
                                }
                                else{
                                    echo "<td></td>";
                                    echo "<td></td>";
                                }
                                echo "<td>" . $location->getSTATIONEMPRUNT() ."</td>";
                                echo "<td>" . $location->getSTATIONDEPOT() ."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </center>
        </div>
        <div id="bas">
            <?php include 'bas.php'; ?>
        </div>

    </div>
</div