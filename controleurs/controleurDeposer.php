<?php

include_once 'modeles/dto/stations.php';

$lesStations = StationDAO::lesStations();
$laStation = stations::chercher($lesStations , $_SESSION['NumStation']);



include_once 'vues/vueDeposer.php';