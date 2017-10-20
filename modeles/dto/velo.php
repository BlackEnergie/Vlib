<?php
class velo{
    private $num;
    private $EtatActuel;
    private $DMEC;

    /**
     * velo constructor.
     * @param $num
     * @param $EtatActuel
     * @param $DMEC
     */
    public function __construct($num, $EtatActuel, $DMEC)
    {
        $this->num = $num;
        $this->EtatActuel = $EtatActuel;
        $this->DMEC = $DMEC;
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