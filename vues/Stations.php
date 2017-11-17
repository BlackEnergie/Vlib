


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
                        <td>/td>
                        <td></td>
                    </tr>
                </thead><
                <tbody>
                    <?php
                        /* Création du tableau avec l'etat des station, le n°, le nom, le nombre de velo disponible, le nombre de places, ... */
                        $tab = "";
                        $listeStation = StationDAO::lesStations();
                        if(count($listeStation) > 0){
                            foreach($listeStation as $station){
                                $tab .= <tr><td>$station[0]</td>
                                            <td>$station[2]</td>
                                            <td>$station[4]</td>
                                            <td>$station[5]</td>
                                            <td></td>
                                            <td>$station[3]</td></tr>;
                                $tab .="<tr><td>$station[0]</td>
                                            <td>$station[2]</td>
                                            <td>$station[1]</td>
                                            <td>$station[4]</td>
                                            <td>$station[5]</td>
                                            <td></td>
                                            <td>$station[3]</td></tr>";
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
