<?php

class velo{
    private $NUMV;
    private $NUM;
    private $NUMS;
    private $ETATV;
    private $DMEC;

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
     * velo constructor.
     * @param $num
     * @param $EtatActuel
     * @param $DMEC
     */

    public function __construct()
    {

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
    public function getNUM()
    {
        return $this->NUM;
    }

    /**
     * @param mixed $num
     */
    public function setNUM($NUM)
    {
        $this->NUM = $NUM;
    }

    /**
     * @return mixed
     */
    public function getETATV()
    {
        return $this->ETATV;
    }

    /**
     * @param mixed $ETATV
     */
    public function setETATV($ETATV)
    {
        $this->ETATV = $ETATV;
    }

    /**
     * @return mixed
     */
    public function getDMEC()
    {
        return $this->DMEC;
    }

    /**
     * @param mixed $DMEC
     */
    public function setDMEC($DMEC)
    {
        $this->DMEC = $DMEC;
    }


}