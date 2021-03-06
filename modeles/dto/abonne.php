<?php
class abonne{
    private $CODEACCES;
    private $NOM;
    private $PRENOM;
    private $DATEDEB_ABON;
    private $DATEFINABON;
    private $CREDITTEMPS;
    private $MONTANTADEBITER;
    private $VELOS;
    private $ABONNEMENT;
    private $LOCATIONS;


    /**
     * abonne constructor.
     * @param $codeAcces
     */

    public function __construct($codeAcces)
    {
        $this->CODEACCES = $codeAcces;
        $this->LOCATIONS = AbonneDAO::toutesLesLocations($this);
        AbonneDAO::velosEmpruntes($this);
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
     * @return array|null
     */
    public function getLOCATIONS()
    {
        return $this->LOCATIONS;
    }

    /**
     * @param array|null $LOCATIONS
     */
    public function setLOCATIONS($LOCATIONS)
    {
        $this->LOCATIONS = $LOCATIONS;
    }

    /**
     * @return mixed
     */
    public function getVELOS()
    {
        return $this->VELOS;
    }

    /**
     * @param mixed $VELOS
     */
    public function setVELOS($VELOS)
    {
        $this->VELOS = $VELOS;
    }

    /**
     * @return mixed
     */
    public function getABONNEMENT()
    {
        return $this->ABONNEMENT;
    }

    /**
     * @param mixed $ABONNEMENT
     */
    public function setABONNEMENT($ABONNEMENT)
    {
        $this->ABONNEMENT = $ABONNEMENT;
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
    public function getNOM()
    {
        return $this->NOM;
    }

    /**
     * @param mixed $NOM
     */
    public function setNOM($NOM)
    {
        $this->NOM = $NOM;
    }

    /**
     * @return mixed
     */
    public function getPRENOM()
    {
        return $this->PRENOM;
    }

    /**
     * @param mixed $PRENOM
     */
    public function setPRENOM($PRENOM)
    {
        $this->PRENOM = $PRENOM;
    }

    /**
     * @return mixed
     */
    public function getDATEDEBABON()
    {
        return $this->DATEDEB_ABON;
    }

    /**
     * @param mixed $DATEDEB_ABON
     */
    public function setDATEDEBABON($DATEDEB_ABON)
    {
        $this->DATEDEB_ABON = $DATEDEB_ABON;
    }

    /**
     * @return mixed
     */
    public function getDATEFINABON()
    {
        return $this->DATEFINABON;
    }

    /**
     * @param mixed $DATEFINABON
     */
    public function setDATEFINABON($DATEFINABON)
    {
        $this->DATEFINABON = $DATEFINABON;
    }

    /**
     * @return mixed
     */
    public function getCREDITTEMPS()
    {
        return $this->CREDITTEMPS;
    }

    /**
     * @param mixed $CREDITTEMPS
     */
    public function setCREDITTEMPS($CREDITTEMPS)
    {
        $this->CREDITTEMPS = $CREDITTEMPS;
    }

    /**
     * @return mixed
     */
    public function getMONTANTADEBITER()
    {
        return $this->MONTANTADEBITER;
    }

    /**
     * @param mixed $numTelephone
     */
    public function setMONTANTADEBITER($MONTANTADEBITER)
    {
        $this->MONTANTADEBITER = $MONTANTADEBITER;



    }


}