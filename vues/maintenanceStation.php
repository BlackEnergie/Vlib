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

                    $selectEtatStation = Formulaire::creerSelect("etatStation", "etatStation", null, $TabOptions);

                    /* Création du tableau avec le choix de l'etat des station, le n°, le nom, le nombre de velo disponible, le nombre de places, ... */
                    $tab = "";
                    $listeStation = StationDAO::lesStations();

                    if(count($listeStation) > 0){
                        foreach($listeStation as $station){
                            $tab .= "<tr><td>" . $station->getNUMS() ."</td>";
                            $tab .= "<td>" . $station->getNOMS() ."</td>";
                            $tab .= "<td>" . $selectEtatStation ."</td>";
                            $tab .= "<td>" . $station->getNbVelos() ."</td>";
                            $tab .= "<td>" . $station->getCAPACITES() ."</td>";
                            $tab .= "<td>" ."CB". "</td>";
                            $tab .= "<td>" ."->Plan"."</td>";
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

        </div>
    </div>

    <div id="bas">
        <?php  include 'bas.php' ;?>
    </div>

</div>