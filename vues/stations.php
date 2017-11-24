


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
                        <td>Etat</td>
                        <td>Vélo</td>
                        <td>Places</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        /* Création du tableau avec l'etat des station, le n°, le nom, le nombre de velo disponible, le nombre de places, ... */
                        $tab = "";
                        $listeStation = StationDAO::lesStations();

                        if(count($listeStation) > 0){
                            foreach($listeStation as $station){
                                $tab .= "<tr><td>" . $station->getNUMS() ."</td>";
                                $tab .= "<td>" . $station->getNOMS() ."</td>";
                                $tab .= "<td>" . $station->getETATS() ."</td>";
                                $tab .= "<td>" .StationDAO::NbDeVeloDispo($station->getNUMS()) ."</td>";
                                $tab .= "<td>" . $station->getCAPACITES() ."</td>";
                                $tab .= "<td>" ."CB". "</td>";
                                $tab .= "<td>" ."->Plan"."</td>";
                                $tab .= "</tr>";
                            }
                        }
                        echo $tab;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="bas">
        <?php  include 'bas.php' ;?>
    </div>

</div>
