<?php
class plot{
    private $num;
    private $etatActuel;

    /**
     * plot constructor.
     * @param $num
     * @param $etatActuel
     */
    public function __construct($num, $etatActuel)
    {
        $this->num = $num;
        $this->etatActuel = $etatActuel;
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
        return $this->etatActuel;
    }

    /**
     * @param mixed $etatActuel
     */
    public function setEtatActuel($etatActuel)
    {
        $this->etatActuel = $etatActuel;
    }


}