<?php

if(isset($_SESSION['abonne'])){
    AbonneDAO::velosEmpruntes($_SESSION['abonne']);
}


include_once 'vues/MonCompte.php';



?>
