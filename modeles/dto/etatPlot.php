<?php
class etatPlot{
    private $etat;
    private $dureeinterv;
    private $heure;
    private $date;

    /**
     * etatPlot constructor.
     * @param $etat
     * @param $dureeinterv
     * @param $heure
     * @param $date
     */
    public function __construct($etat, $dureeinterv, $heure, $date)
    {
        $this->etat = $etat;
        $this->dureeinterv = $dureeinterv;
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
    public function getDureeinterv()
    {
        return $this->dureeinterv;
    }

    /**
     * @param mixed $dureeinterv
     */
    public function setDureeinterv($dureeinterv)
    {
        $this->dureeinterv = $dureeinterv;
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