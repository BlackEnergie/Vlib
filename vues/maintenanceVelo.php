<div id="conteneur">

    <div id="header">
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div id="classement">


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


            </table>
        </div>
    </div>

    <div id="bas">
        <?php  include 'bas.php' ;?>
    </div>

</div>