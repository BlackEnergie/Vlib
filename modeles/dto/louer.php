<?php

class louer
{
    private $CODEACCES;
    private $NUMV;
    private $HEURE;
    private $DATEM;
    private $TEMPSLOC;
    private $STATIONEMPRUNT;
    private $STATIONDEPOT;

    public function __construct()
    {
        $this->STATIONEMPRUNT = StationDAO::rechercherID($this->STATIONEMPRUNT);
        if(!is_null($this->STATIONDEPOT))
            $this->STATIONDEPOT = StationDAO::rechercherID($this->STATIONDEPOT);

    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function getDateHeureDepot(){
        $dateDepot = null;
        if(!is_null($this->TEMPSLOC)){
            $dateDepot = date_create($this->DATEM. ' ' . $this->HEURE);
            $dateDepot->add(new DateInterval('PT' . $this->TEMPSLOC . 'M'));
        }
        return $dateDepot;
    }

    /**
     * @return mixed
     */
    public function getSTATIONEMPRUNT()
    {
        return $this->STATIONEMPRUNT;
    }

    /**
     * @param mixed $STATIONEMPRUNT
     */
    public function setSTATIONEMPRUNT($STATIONEMPRUNT)
    {
        $this->STATIONEMPRUNT = $STATIONEMPRUNT;
    }

    /**
     * @return mixed
     */
    public function getSTATIONDEPOT()
    {
        return $this->STATIONDEPOT;
    }

    /**
     * @param mixed $STATIONDEPOT
     */
    public function setSTATIONDEPOT($STATIONDEPOT)
    {
        $this->STATIONDEPOT = $STATIONDEPOT;
    }



    /**
     * @return mixed
     */
    public function getCODEACCES()
    {
        return $this->CODEACCES;
    }

    /**
     * @param mixed $CODEACCES
     */
    public function setCODEACCES($CODEACCES)
    {
        $this->CODEACCES = $CODEACCES;
    }

    /**
     * @return mixed
     */
    public function getNUMV()
    {
        return $this->NUMV;
    }

    /**
     * @param mixed $NUMV
     */
    public function setNUMV($NUMV)
    {
        $this->NUMV = $NUMV;
    }

    /**
     * @return mixed
     */
    public function getHEURE()
    {
        return $this->HEURE;
    }

    /**
     * @param mixed $HEURE
     */
    public function setHEURE($HEURE)
    {
        $this->HEURE = $HEURE;
    }

    /**
     * @return mixed
     */
    public function getDATEM()
    {
        return $this->DATEM;
    }

    /**
     * @param mixed $DATEM
     */
    public function setDATEM($DATEM)
    {
        $this->DATEM = $DATEM;
    }

    /**
     * @return mixed
     */
    public function getTEMPSLOC()
    {
        return $this->TEMPSLOC;
    }

    /**
     * @param mixed $TEMPSLOC
     */
    public function setTEMPSLOC($TEMPSLOC)
    {
        $this->TEMPSLOC = $TEMPSLOC;
    }


}