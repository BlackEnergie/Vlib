<?php


function tableauHtml($tab, $classTab, $classLigne, $classCell){
    $res = "<table class='" . $classTab ."'>";
    if(count($tab)>0){
        foreach ($tab as  $ligne) {
            $res .= "<tr class='" . $classLigne . "'>";
            foreach ($ligne as $cellule) {
                $res .= "<td class='" . $classCell . "'>" . $cellule . "</td>";
            }
            $res .= "</tr>";
        }
    }
    $res .= "</table>";
    return $res;
}
