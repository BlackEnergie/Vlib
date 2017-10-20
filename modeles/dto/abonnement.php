<?php
class abonnement
{
    private $code;
    private $libelle;
    private $duree;
    private $montant;
    private $creditTempsBase;
    private $tarifHoraire;
    private $caution;
    private $type;

    /**
     * abonnement constructor.
     * @param $code
     * @param $libelle
     * @param $duree
     * @param $montant
     * @param $creditTempsBase
     * @param $tarifHoraire
     * @param $caution
     * @param $type
     */
    public function __construct($code, $libelle, $duree, $montant, $creditTempsBase, $tarifHoraire, $caution, $type)
    {
        $this->code = $code;
        $this->libelle = $libelle;
        $this->duree = $duree;
        $this->montant = $montant;
        $this->creditTempsBase = $creditTempsBase;
        $this->tarifHoraire = $tarifHoraire;
        $this->caution = $caution;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getCreditTempsBase()
    {
        return $this->creditTempsBase;
    }

    /**
     * @param mixed $creditTempsBase
     */
    public function setCreditTempsBase($creditTempsBase)
    {
        $this->creditTempsBase = $creditTempsBase;
    }

    /**
     * @return mixed
     */
    public function getTarifHoraire()
    {
        return $this->tarifHoraire;
    }

    /**
     * @param mixed $tarifHoraire
     */
    public function setTarifHoraire($tarifHoraire)
    {
        $this->tarifHoraire = $tarifHoraire;
    }

    /**
     * @return mixed
     */
    public function getCaution()
    {
        return $this->caution;
    }

    /**
     * @param mixed $caution
     */
    public function setCaution($caution)
    {
        $this->caution = $caution;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}