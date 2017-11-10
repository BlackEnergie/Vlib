<?php
class velo{
    private $num;
    private $lePlot;
    private $EtatActuel;
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
<<<<<<< HEAD
    public function __construct($num)
    {
        $this->num = $num;
=======
    public function __construct($num, $lePlot, $EtatActuel, $DMEC)
    {
        $this->num = $num;
        $this->lePlot = $lePlot;
        $this->EtatActuel = $EtatActuel;
        $this->DMEC = $DMEC;
>>>>>>> 4f6311356fa2317bddd20404ad5f9cbb61e2223d
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return mixed
     */
    public function getLePlot()
    {
        return $this->lePlot;
    }

    /**
     * @param mixed $num
     */
    public function setLePlot($lePlot)
    {
        $this->lePlot = $lePlot;
    }

    /**
     * @return mixed
     */
    public function getEtatActuel()
    {
        return $this->EtatActuel;
    }

    /**
     * @param mixed $EtatActuel
     */
    public function setEtatActuel($EtatActuel)
    {
        $this->EtatActuel = $EtatActuel;
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