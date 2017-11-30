<?php
class station{
    private $NUMS;
    private $ETATS;
    private $NOMS;
    private $SITUATIONS;
    private $CAPACITES;
    private $NUMBORNE;
    private $nbVelos;

    /**
     */
    public function __construct($num)
    {
        $this->NUMS = $num;
        StationDAO::nbDeVeloDispo($this);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getNbVelos()
    {
        return $this->nbVelos;
    }

    /**
     * @param mixed $nbVelos
     */
    public function setNbVelos($nbVelos)
    {
        $this->nbVelos = $nbVelos;
    }


    /**
     * @return mixed
     */
    public function getNUMS()
    {
        return $this->NUMS;
    }

    /**
     * @param mixed $NUMS
     */
    public function setNUMS($NUMS)
    {
        $this->NUMS = $NUMS;
    }

    /**
     * @return mixed
     */
    public function getETATS()
    {
        return $this->ETATS;
    }

    /**
     * @param mixed $EtatActuel
     */
    public function setETATS($EtatActuel)
    {
        $this->ETATS = $EtatActuel;
    }

    /**
     * @return mixed
     */
    public function getNOMS()
    {
        return $this->NOMS;
    }

    /**
     * @param mixed $nom
     */
    public function setNOMS($nom)
    {
        $this->NOMS = $nom;
    }

    /**
     * @return mixed
     */
    public function getSITUATIONS()
    {
        return $this->SITUATIONS;
    }

    /**
     * @param mixed $situation
     */
    public function setSITUATIONS($situation)
    {
        $this->SITUATIONS = $situation;
    }

    /**
     * @return mixed
     */
    public function getCAPACITES()
    {
        return $this->CAPACITES;
    }

    /**
     * @param mixed $capacite
     */
    public function setCAPACITES($capacite)
    {
        $this->CAPACITES = $capacite;
    }

    /**
     * @return mixed
     */
    public function getNUMBORNE()
    {
        return $this->NUMBORNE;
    }

    /**
     * @param mixed $NUMBORNE
     */
    public function setNUMBORNE($NUMBORNE)
    {
        $this->NUMBORNE = $NUMBORNE;
    }


}