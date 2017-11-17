<?php
class station{
    public $NUMS;
    private $EtatActuel;
    public $nom;
    private $situation;
    private $capacite;
    private $numBorne;

    /**
     * station constructor.
     * @param $num
     * @param $EtatActuel
     * @param $nom
     * @param $situation
     * @param $capacite
     * @param $numBorne
     */
    public function __construct($num)
    {
        $this->NUMS = $num;
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
        return $this->EtatActuel;
    }

    /**
     * @param mixed $EtatActuel
     */
    public function setETATS($EtatActuel)
    {
        $this->EtatActuel = $EtatActuel;
    }

    /**
     * @return mixed
     */
    public function getNOMS()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNOMS($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getSITUATIONS()
    {
        return $this->situation;
    }

    /**
     * @param mixed $situation
     */
    public function setSITUATIONS($situation)
    {
        $this->situation = $situation;
    }

    /**
     * @return mixed
     */
    public function getCAPACITES()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setCAPACITES($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return mixed
     */
    public function getNUMBORNE()
    {
        return $this->numBorne;
    }

    /**
     * @param mixed $numBorne
     */
    public function setNUMBORNE($numBorne)
    {
        $this->numBorne = $numBorne;
    }


}