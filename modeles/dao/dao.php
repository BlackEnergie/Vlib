<?php
require_once 'configs/param.php';

class DBConnex extends PDO{

    private static $instance;

    public static function getInstance(){
        if ( !self::$instance ){
            self::$instance = new DBConnex();
        }
        return self::$instance;
    }

    function __construct(){
        try {
            parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Impossible de se connecter." );
        }
    }

    public function __destruct(){
        if(!is_null(self::$instance)){
            self::$instance = null;
        }
    }


    public function queryFetchAll($sql){
        $sth  =$this->query($sql);

        if ( $sth ){
            return $sth -> fetchAll(PDO::FETCH_ASSOC);
        }

        return false;
    }


    public function queryFetchFirstRow($sql){
        $sth    = $this->query($sql);
        $result    = array();

        if ( $sth ){
            $result  = $sth -> fetch();
        }

        return $result;
    }


    public function insert($sql){
        if ( $this -> exec($sql) > 0 ){
            return 1;
            //$this->lastInsertId();
        }
        return false;
    }

    public function update($sql){
        return $this->exec($sql) ;
    }

    public function delete($sql){
        return $this->exec($sql) ;
    }
}

class StationDAO{

    public static function lire(station $station){
        $sql = "select * from STATION where NUMS='". $station->getNum() ."'" ;
        $station = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $station;
    }

    public static function lesStations(){
        $result = array();
        $sql = "select * from STATION order by NOMS " ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $station){

                $uneStation = new station($station['NUMS']);
                $uneStation->hydrate($station);
                $result[] = $uneStation;
            }
        }
        return $result;
    }

    public static function rechercher($nom){
        $result = array();
        $sql = "select NUMS, NOMS, CAPACITES from station where NOMS LIKE '" . $nom . "%' order by NOMS";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $station){
                $uneStation = new station($station['NUMS']);
                $uneStation->hydrate($station);
                $result[] = $uneStation;
            }
        }
        return $result;
    }

    public static function rechercherID($id){
        $sql = "select NUMS, NOMS, CAPACITES from station where NUMS='" . $id . "';";
        $station = DBConnex::getInstance()->queryFetchFirstRow($sql);
        $uneStation = new station($station['NUMS']);
        $uneStation->hydrate($station);
        return $uneStation;
    }

    public static function nbDeVeloDispo(station $station){
        $sql = "select count(PLOT.NUM) from PLOT where PLOT.NUMV is not Null and PLOT.NUMS= '". $station->getNUMS()."'";
        $nbVelo = DBConnex::getInstance()->queryFetchFirstRow($sql);
        $station->setNbVelos($nbVelo[0]);
    }

    public static function plotsDiponiblesStation(station $station){
        $res = array();
        $sql = "select * from plot WHERE NUMV is null and NUMS = '" . $station->getNUMS() . "' order by NUM;";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        foreach ($liste as $plot){
            $unPlot = new plot();
            $unPlot->hydrate($plot);
            $res[] = $unPlot;
        }
        return $res;
    }
}

class louerDAO{

    public static function louerVelo($unIdVelo, $unIdAbonne, $unIdStation, $codeSecret, $date, $heure){
        $res = true;
        $sql = "UPDATE `velo` SET `NUMS` = NULL, `NUM` = NULL WHERE `velo`.`NUMV` = '". $unIdVelo ."';";
        $res = DBConnex::getInstance()->update($sql);
        $sql = "UPDATE `plot` SET `NUMV` = NULL WHERE `plot`.`NUMS` = '". $unIdStation ."' AND `plot`.`NUM` = '". $unIdVelo ."';";
        $res = DBConnex::getInstance()->update($sql);
        $sql = "INSERT INTO `louer` (`CODEACCES`, `CODESECRET`, `NUMV`, `HEURE`, `DATEM`, `TEMPSLOC`) VALUES ('". $unIdAbonne ."', '". $codeSecret ."', '". $unIdVelo ."', '" . $heure . "', '". $date ."', NULL);";
        $res = DBConnex::getInstance()->insert($sql);
        return $res;
    }

    public static function deposerVelo($unIdVelo, $unIdAbonne, $unIdStation, $unPlot , $heure){
        $res = true;
        $sql = "";
    }

}


class DAOAbonnement{

    public static function chargeLesAbonnement()
    {

        $sql = "SELECT CODEA,  LIBELLEA,DUREEA,MONTANTA,CREDITTEMPSBASE,  TARIFHORAIRE,CAUTION FROM
                      ABONNEMENT";
        $listeAbo = new Abonnements();
        $resultat = DBConnex::getInstance()->queryFetchAll($sql);
        if (count($resultat) > 0) {
            foreach ($resultat as $item) {
                $unAbo = new Abonnement($item['CODEA'], $item['LIBELLEA'], $item['DUREEA'], $item['MONTANTA'], $item['CREDITTEMPSBASE'], $item['TARIFHORAIRE']
                    , $item['CAUTION']);
                $listeAbo->ajouterUnAbonnement($unAbo);

            }
        }
        return $listeAbo;
    }

    public function insertAbonnement($codea, $code, $libellea, $dureea, $montanta, $credittempsbase, $tarifhoraire, $caution)
    {
        $sql = "INSERT INTO abonnement (CODEA, CODE, LIBELLEA, DUREEA, MONTANTA, CREDITTEMPSBASE, TARIFHORAIRE, CAUTION) VALUES (:codea,:code,:libellea,:dureea,:montanta,:credittempsbase,:tarifhoraire,:caution)";
        $req = DBConnex::getInstance()->prepare($sql);
        $req->bindParam(':codea',$codea);
        $req->bindParam(':code', $code);
        $req->bindParam(':libellea', $libellea);
        $req->bindParam(':dureea', $dureea);
        $req->bindParam(':montanta', $montanta);
        $req->bindParam(':credittempsbase', $credittempsbase);
        $req->bindParam(':tarifhoraire', $tarifhoraire);
        $req->bindParam(':caution', $caution);
        $req->execute();
    }
}
Class AbonneDAO{
//*********** vérifie si l'abonne qui tente de se connecter a un codeacces et codesecret existant dans la bdd***********
    public static function verification(abonne $abonne){
        $sql = "select CODEACCES from ABONNE where CODEACCES = '" . $abonne->getCODEACCES() . "' and  CODESECRET =  '" . $_POST['mdp'] ."'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if(empty($login)){
            return null;
        }
        return $login[0];
    }

    public static function verificationEmprunt(abonne $abonne){
        $sql = "select CODEACCES from ABONNE where CODEACCES = '" . $abonne->getCODEACCES() . "' and  CODESECRET =  '" . $_POST['codeSecret'] ."'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if(empty($login)){
            return null;
        }
        return $login[0];
    }

//************ requete qui insere un abonné dans la bdd******************
    public static function insertAbonne($codeacces, $codesecret, $codea, $nom, $prenom, $datedebAbon, $datefinabon, $credittemps, $montantadebiter)
       {
           $sql = "INSERT INTO abonne (CODEACCES, CODESECRET, CODEA, NOM, PRENOM, DATEDEB_ABON, DATEFINABON, CREDITTEMPS, MONTANTADEBITER) VALUES (:codeacces,:codesecret,:codea,:nom,:prenom,:datedebAbon,:datefinabon,:credittemps,:montantadebiter)";
           $req = DBConnex::getInstance()->prepare($sql);
           $req->bindParam(':codeacces',$codeacces);
           $req->bindParam(':codesecret',$codesecret);
           $req->bindParam(':codea',$codea);
           $req->bindParam(':nom', $nom);
           $req->bindParam(':prenom',$prenom);
           $req->bindParam(':datedebAbon',$datedebAbon);
           $req->bindParam(':datefinabon',$datefinabon);
           $req->bindParam(':credittemps',$credittemps);
           $req->bindParam(':montantadebiter',$montantadebiter);
           $req->execute();
       }
//************* requete qui suprrime le compte d'un abonné********
       public function deleteAbonne($codeA, $codeS)
    {
        $sql = "DELETE FROM Abonne WHERE CODEACCES = :codeacces  AND CODESECRET = :codesecret";
        $req = DBConnex::getInstance()->prepare($sql);
        $req->bindParam(':codeacces', $codeA);
        $req->bindParam(':codesecret', $codeS);
        $req->execute();
    }
//********** charge tous les abonné present dans la bdd********
    public function chargerLesAbonne()
    {
        $mesAbo = [];
        $sql = "SELECT CODEACCES,CODESECRET,CODEA,NOM,PRENOM, DATEDEB_ABON,DATEFINABON,CREDITTEMPS ,MONTANTADEBITER
                    From ABONNE";
        $resultat = DBConnex::getInstance()->queryFetchAll($sql);
        if (count($resultat) > 0) {
            foreach ($resultat as $item) {
                $unAbo = new Abonne($item['CODEACCES'], $item['CODESECRET'], $item['NOM'], $item['PRENOM'], $item['DATEDEB_ABON'], $item['DATEFINABON']
                    , $item['CREDITTEMPS'], $item['MONTANTADEBITER'], $item['CODEA']);
                $mesAbo[] = $unAbo;
            }
        }
        return $mesAbo;
    }

    public static function verifEmprunt(abonne $abonne){
        $sql = "select NOM, PRENOM from ABONNE WHERE CODEACCES ='" . $abonne->getCODEACCES() . "'and CODESECRET = '" . $_POST['codeSecret'] . "'" ;
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if(empty($login)){
            return null;
        }
        return $login[0];
    }

    public static function velosEmpruntes(abonne $abonne){
        $res = array();
        $sql = "select V.* from louer as L ,velo as V where L.NUMV = V.NUMV and CODEACCES = '" . $abonne->getCODEACCES() . "'";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        foreach ($liste as $velo){
            $unVelo = new velo();
            $unVelo->hydrate($velo);
            $res[] = $unVelo;
        }
        $abonne->setVELOS($res);
    }
}


Class ResponsableDAO{
    /*
  creation des requetes suivante nécessaire :
    - insertion d'un nouveau responsable
    - modification des donnée d'un responsable
    - suppression d'un responsable
  récupéré md5 de championnat afin d'enregistrer le code choisi
  par le responsable de façon crypté
    */
    public static function verification(responsable $responsable){
        $sql = "select CODEACCES from RESPONSABLE where CODEACCES = '" . $responsable->getCodeAcces() . "' and  CODESECRET =  '" . $_POST['mdp'] ."'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if(empty($login)){
            return null;
        }
        return $login[0];
    }
    public static function insertResponsable($codeacces, $codesecret, $codea, $nom, $prenom, $dateEmbauche)
    {
        $sql = "INSERT INTO responsable (CODEACCES, CODESECRET, CODEA, NOM, PRENOM, DATEEMBAUCHE) VALUES (:codeacces,:codesecret,:codea,:nom,:prenom,:dateEmbauche)";
        $req = DBConnex::getInstance()->prepare($sql);
        $req->bindParam(1, $codeacces);
        $req->bindParam(2, $codesecret);
        $req->bindParam(3, $codea);
        $req->bindParam(4, $nom);
        $req->bindParam(5, $prenom);
        $req->bindParam(6, $dateEmbauche);
        $req->execute();
    }

    public function deleteResponsable($codeA, $codeS)
    {
        $sql = "DELETE FROM responsable WHERE CODEACCES = :codeacces  AND CODESECRET = :codesecret";
        $req = DBConnex::getInstance()->prepare($sql);
        $req->bindParam(1, $codeA);
        $req->bindParam(2, $codeS);
        $req->execute();
    }

}

class PlotDAO{


    public static function lire(plot $plot){
        $sql = "select * from PLOT where NUM='" . $plot->getNUM() ."'";
        $plot = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $plot;
    }

    public static function lesPlots(){
        $result = array();
        $sql = "select * from PLOT order by NUMS" ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $plot){
                $uneStation = new plot();
                $uneStation->hydrate($plot);
                $result[] = $uneStation;
            }
        }
        return $result;
    }

}

class VeloDAO{

    public static function lire(velo $velo){
        $sql = "select * from VELO where NUMV='" . $velo->getNUMV() ."'";
        $velo = DBConnex::getInstance()->queryFetchAll($sql);
        return $velo;
    }

    public static function lesVelos(){
        $result = array();
        $sql = "select * from VELO order by NUMV" ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $velo){
                $unVelo = new velo();
                $unVelo->hydrate($velo);
                $result[] = $unVelo;
            }
        }
        return $result;
    }

    public static function lesVelosStation($idStation){
        $result = array();
        $sql = "select * from VELO WHERE NUMS='" . $idStation . "' order by NUMV " ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $velo){
                $unVelo = new velo();
                $unVelo->hydrate($velo);
                $result[] = $unVelo;
            }
        }
        return $result;
    }

}

class AbonnementsDAO{

    public static function lesAbonnements(){
        $result = array();
        $sql = "select * from abonnement" ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $abo){
                $unAbo = new abonnement();
                $unAbo->hydrate($abo);
                $result[] = $unAbo;
            }
        }
        return $result;
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//      Fonctions de remplissage de la base de données
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//$lesStations = StationDAO::lesStations();

function addPlot($Stations){
    foreach ($Stations as $uneStation){
        for ($i = 1; $i <= $uneStation->getCAPACITES() ; $i++){
           $sql = "INSERT INTO `plot` (`NUMS`, `NUM`, `NUMV`, `ETAT`) VALUES ('". $uneStation->getNUMS() ."', '" . $i . "', NULL, 'ES')";
           DBConnex::getInstance()->insert($sql);
        }
    }
}

//addPlot($lesStations);

//$lesPlots = PlotDAO::lesPlots();

function addVelo($Plots){
    $i = 8;
    foreach ($Plots as $plot) {
        $sql = "INSERT INTO `velo` (`NUMV`, `NUMS`, `NUM`, `ETATV`, `DMEC`) VALUES ('" . $i . "', '" . $plot->getNUMS() . "', '" . $plot->getNUM() . "', 'ES', '2015-10-10');";
        DBConnex::getInstance()->insert($sql);
        $sql = "UPDATE `plot` SET `NUMV` = '" . $i . "' WHERE `plot`.`NUMS` = '" . $plot->getNUMS() . "' AND `plot`.`NUM` = '" . $plot->getNUM() . "';";
        DBConnex::getInstance()->update($sql);
        $i++;
    }
}

//addVelo($lesPlots);

function ajouterAbonnements(){
    $sql = "INSERT INTO `abonnement` VALUES ('24h', '24 heures', 24 , 1.6 , 24 , 2 ,200, NULL),('1mois', '1 mois', 30, 15, 720, 1, 200, NULL), ('1an', '1 an', 365, 35, 21900, 1, 200 , NULL);";
    DBConnex::getInstance()->insert($sql);
}

//ajouterAbonnements();


