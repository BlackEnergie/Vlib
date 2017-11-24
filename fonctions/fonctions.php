<?php


function tableauHtml($tab,$entete , $classEntete, $classTab, $classLigne){
    $res = "<table class='" . $classTab ."'>";
    if(count($entete)>0){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th class='" . $classEntete . "'>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if(count($tab)>0){
        foreach ($tab as  $ligne) {
            $res .= "<tr class='" . $classLigne . "'>";
            foreach ($ligne as $cellule) {
                $res .= "<td>" . $cellule . "</td>";
            }
            $res .= "</tr>";
        }
    }
    $res .= "</table>";
    return $res;
}

function tabStation($tab, $entete, $classTab){
    $res = "<table class'" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $station){
            $res .= "<tr><td>";
            $res .= $station->getNUMS() . "</td><td><a href='#'>";
            $res .= $station->getNOMS() . "</a></td><td>";
            $res .= ($station->getCAPACITES() - $station->getNbVelos()) . "</td><td>";
            $res .= $station->getNbVelos() . "</td><td>";
            if($station->getNbVelos() >= 1) {
                $res .= "<a href = 'index.php?numStation=" . $station->getNUMS() . "'>";
                $res .= "<img src='images/fleche.jpg' alt='lien'></a></td></tr>";
            } else{
                $res .= "<img src='images/erreur.png' alt=''></a></td></tr>";
            }
        }
    }
    $res .= "</table>";
    return $res;
}
