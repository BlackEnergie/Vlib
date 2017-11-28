<?php

class louer
{
    private $CODEACCES;
    private $NUMV;
    private $HEURE;
    private $DATEM;
    private $TEMPSLOC;

    public function __construct()
    {

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