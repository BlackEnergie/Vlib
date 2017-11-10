<?php

class DBConnex
{
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
            die("Impossible de se connecter. " );
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
        $sql = "select * from STATION where ";
        $equipe = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $equipe;
    }



    public static function lesEquipes(){
        $result = array();
        $sql = "select * from equipe order by nomEquipe " ;
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        if(!empty($liste)){
            foreach($liste as $equipe){
                $uneEquipe = new Equipe($equipe['idEquipe'],$equipe['nomEquipe'] );
                $uneEquipe->hydrate($equipe);
                $result[] = $uneEquipe;
            }
        }
        return $result;
    }

    public static function modifier(Equipe $equipe){
        $sql = "update equipe set 
                    nomEquipe = '" . $equipe->getNomEquipe() . "',
                    nomEquipeLong = '" .$equipe->getNomEquipeLong() . "',
                    nomEntraineur = '" . $equipe->getNomEntraineur(). "',
                    nomPresident = '" . $equipe->getNomPresident() . "',
                    dateFondation = " . $equipe->getDateFondation() .
            "where idEquipe =" . $equipe->getIdEquipe();
        return DBConnex::getInstance()->update($sql);
    }

    public static function ajouter(Equipe $equipe){
        $sql = "insert into equipe values (" . $equipe->getIdEquipe() ."
                '" . $equipe->getNomEquipe() . "','" .$equipe->getNomEquipeLong() .
            "','" . $equipe->getNomEntraineur() . "','" .$equipe->getNomEntraineur() .
            "','" . $equipe->getNomPresident() . "'," . $equipe->getDateFondation();
        return DBConnex::getInstance()->queryFetchAll($sql);
    }

    public static function supprimer(Equipe $equipe){
        $sql = "delete from equipe where idEquipe = " . $equipe->getIdEquipe();
        return DBConnex::GetInstance()->queryFetchAll($sql);
    }

}

Class utilisateurDAO{

    public static function verification(Utilisateur $utilisateur){
        $sql = "select login from Utilisateur where login = '" . $utilisateur->getLogin() . "' and  mdp =  '" .md5($utilisateur->getMdp()) ."'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if(empty($login)){
            return null;
        }
        return $login[0];
    }
}
