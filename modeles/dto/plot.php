<?php
class plot{
    private $NUMS;
    private $NUM;
    private $ETAT;
    private $NUMV;

    /**
     * plot constructor.
     * @param $laStation
     * @param $num
     * @param $etatActuel
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
    public function getNUMS()
    {
        return $this->NUMS;
    }

    /**
     * @param mixed $numStation
     */
    public function setNUMS($laStation)
    {
        $this->NUMS = $laStation;
    }

    /**
     * @return mixed
     */
    public function getNUM()
    {
        return $this->NUM;
    }

    /**
     * @param mixed $NUM
     */
    public function setNUM($NUM)
    {
        $this->NUM = $NUM;
    }

    /**
     * @return mixed
     */
    public function getETAT()
    {
        return $this->ETAT;
    }

    /**
     * @param mixed $ETAT
     */
    public function setETAT($ETAT)
    {
        $this->ETAT = $ETAT;
    }


}