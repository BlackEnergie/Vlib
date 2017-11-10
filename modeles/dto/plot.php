<?php
class plot{
    private $laStation;
    private $num;
    private $etatActuel;


    /**
     * plot constructor.
     * @param $laStation
     * @param $num
     * @param $etatActuel
     */
    public function __construct($laStation, $num, $etatActuel)
    {
        $this->laStation = $laStation;
        $this->num = $num;
        $this->etatActuel = $etatActuel;
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
    public function getLaStation()
    {
        return $this->laStation;
    }

    /**
     * @param mixed $numStation
     */
    public function setLaStation($numStation)
    {
        $this->laStation = $laStation;
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