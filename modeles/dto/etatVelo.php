<?php
class etatVelo{
    private $etat;
    private $dureeInterv;
    private $heure;
    private $date;

    /**
     * etatVelo constructor.
     * @param $etat
     * @param $dureeInterv
     * @param $heure
     * @param $date
     */
    public function __construct($etat, $dureeInterv, $heure, $date)
    {
        $this->etat = $etat;
        $this->dureeInterv = $dureeInterv;
        $this->heure = $heure;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getDureeInterv()
    {
        return $this->dureeInterv;
    }

    /**
     * @param mixed $dureeInterv
     */
    public function setDureeInterv($dureeInterv)
    {
        $this->dureeInterv = $dureeInterv;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}