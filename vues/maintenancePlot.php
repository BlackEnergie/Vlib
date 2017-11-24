<div id="conteneur">

    <div id="header">
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div id="classement">

            <title>Liste des Plots</title>
            <table class="tab">
                <thead>
                <tr>
                    <td>Station</td>
                    <td>Num</td>
                    <td>Vélo</td>
                    <td>Etat</td>

                </tr>
                </thead>
                <tbody>
                <?php
                /* Création du select pour l'etat des plots */
                $TabOptions = array("ES", "EM", "HS");

                $selectEtatPlot = Formulaire::creerSelect(etatPlot, etatPlot, null, $TabOptions);


                /* Création du tableau avec le choix de l'etat des plots, le n°, la station, le vélo présent */
                $tab = "";
                $listePlots = PlotDAO::lesPlots();
                if(count($listePlots) > 0){
                    foreach($listePlots as $plot){
                        $tab .="<tr><td>".$plot[0]."</td>";
                        $tab .="<td>".$plot[1]."</td>";
                        $tab .="<td>".$plot[2]."</td>";
                        $tab .="<td>".$selectEtatPlot."</td></tr>";
                    }
                }
                return $tab;
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="bas">
        <?php  include 'bas.php' ;?>
    </div>

</div>