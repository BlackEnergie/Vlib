<?php
class abonnement
{
    private $CODEA;
    private $LIBELLEA;
    private $DUREEA;
    private $MONTANTA;
    private $CREDITTEMPSBASE;
    private $TARIFHORAIRE;
    private $CAUTION;
    private $TYPEA;

    /**
     * abonnement constructor.
     * @param $code
     * @param $libelle
     * @param $duree
     * @param $montant
     * @param $creditTempsBase
     * @param $tarifHoraire
     * @param $caution
     * @param $type
     */
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
    public function getCODEA()
    {
        return $this->CODEA;
    }

    /**
     * @param mixed $CODEA
     */
    public function setCODEA($CODEA)
    {
        $this->CODEA = $CODEA;
    }

    /**
     * @return mixed
     */
    public function getLIBELLEA()
    {
        return $this->LIBELLEA;
    }

    /**
     * @param mixed $LIBELLEA
     */
    public function setLIBELLEA($LIBELLEA)
    {
        $this->LIBELLEA = $LIBELLEA;
    }

    /**
     * @return mixed
     */
    public function getDUREEA()
    {
        return $this->DUREEA;
    }

    /**
     * @param mixed $DUREEA
     */
    public function setDUREEA($DUREEA)
    {
        $this->DUREEA = $DUREEA;
    }

    /**
     * @return mixed
     */
    public function getMONTANTA()
    {
        return $this->MONTANTA;
    }

    /**
     * @param mixed $MONTANTA
     */
    public function setMONTANTA($MONTANTA)
    {
        $this->MONTANTA = $MONTANTA;
    }

    /**
     * @return mixed
     */
    public function getCREDITTEMPSBASE()
    {
        return $this->CREDITTEMPSBASE;
    }

    /**
     * @param mixed $CREDITTEMPSBASE
     */
    public function setCREDITTEMPSBASE($CREDITTEMPSBASE)
    {
        $this->CREDITTEMPSBASE = $CREDITTEMPSBASE;
    }

    /**
     * @return mixed
     */
    public function getTARIFHORAIRE()
    {
        return $this->TARIFHORAIRE;
    }

    /**
     * @param mixed $TARIFHORAIRE
     */
    public function setTARIFHORAIRE($TARIFHORAIRE)
    {
        $this->TARIFHORAIRE = $TARIFHORAIRE;
    }

    /**
     * @return mixed
     */
    public function getCAUTION()
    {
        return $this->CAUTION;
    }

    /**
     * @param mixed $CAUTION
     */
    public function setCAUTION($CAUTION)
    {
        $this->CAUTION = $CAUTION;
    }

    /**
     * @return mixed
     */
    public function getTYPEA()
    {
        return $this->TYPEA;
    }

    /**
     * @param mixed $TYPEA
     */
    public function setTYPEA($TYPEA)
    {
        $this->TYPEA = $TYPEA;
    }


}