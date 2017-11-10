.<?php
class station{
    private $num;
    private $EtatActuel;
    private $nom;
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
    public function __construct($num, $EtatActuel, $nom, $situation, $capacite, $numBorne)
    {
        $this->num = $num;
        $this->EtatActuel = $EtatActuel;
        $this->nom = $nom;
        $this->situation = $situation;
        $this->capacite = $capacite;
        $this->numBorne = $numBorne;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * @param mixed $situation
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;
    }

    /**
     * @return mixed
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return mixed
     */
    public function getNumBorne()
    {
        return $this->numBorne;
    }

    /**
     * @param mixed $numBorne
     */
    public function setNumBorne($numBorne)
    {
        $this->numBorne = $numBorne;
    }


}