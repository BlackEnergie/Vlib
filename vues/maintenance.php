<div id="conteneur">

    <div id="header">
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div id="classement">

            <title>Liste des Stations</title>
            <table class="tab">
                <thead>
                <tr>
                    <td>N°</td>
                    <td>Nom</td>
                    <td>Vélos</td>
                    <td>Places</td>
                    <td></td>
                    <td></td>
                    <td>Etat</td>
                </tr>
                </thead>
                <tbody>
                <?php
                    /* Création du select pour l'etat des stations */
                    $TabOptions = array("ES", "EM", "HS");

                    $selectEtatStation = Formulaire::creerSelect(etatStation, etatStation, null, $TabOptions);

                    /* Création du tableau avec le choix de l'etat des station, le n°, le nom, le nombre de velo disponible, le nombre de places, ... */
                    $tab = "";
                    $listeStation = StationDAO::lesStations();
                    if(count($listeStation) > 0){
                        foreach($listeStation as $station){
                            $tab .= "<tr><td>" . $station->getNUMS() ."</td>";
                            $tab .= "<td>" . $station->getNOMS() ."</td>";
                            $tab .= "<td>" .$selectEtatStation ."</td>";
                            $tab .= "<td>" . $station->getNUMBORNE() ."</td>";
                            $tab .= "<td>" . $station->getCAPACITES() ."</td>";
                            $tab .= "<td>" . "</td>";
                            $tab .= "<td>" ."</td>";
                            $tab .= "</tr>";


                            /*$tab .="<tr><td>$station[0]</td>
                                        <td>$station[2]</td>
                                        <td>$station[4]</td>
                                        <td>$station[5]</td>
                                        <td></td>
                                        <td>$station[3]</td>
                                        <td>$selectEtatStation</td></tr>";*/
                            }
                    }
                    return $tab;
                ?>
                </tbody>
            </table>


            <title>Liste des Vélos</title>
            <table class="tab">
                <thead>
                <tr>
                    <td>Num</td>
                    <td>Station</td>
                    <td>Plot</td>
                    <td>Etat</td>

                </tr>
                </thead>
                <tbody>
                <?php
                /* Création du select pour l'etat des velos */
                $TabOptions = array("ES", "EM", "HS", "EU");

                $selectEtatVelo = Formulaire::creerSelect(etatVelo, etatVelo, null, $TabOptions);


                /* Création du tableau avec le choix de l'etat des velos, le n°, la station, le plot */
                $tab = "";
                $listeVelos = VeloDAO::lesVelos();
                if(count($listeVelos) > 0){
                    foreach($listeVelos as $velo){
                        $tab .="<tr><td>".$velo."[0]</td>";
                        $tab .="<td>".$velo[1]."</td>";
                        $tab .="<td>".$velo[2]."</td>";
                        $tab .="<td>".$selectEtatVelo."</td>";
                        $tab .="</tr>";
                            }
                }
                return $tab;
                ?>
                </tbody>
            </table>



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