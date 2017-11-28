<?php
class abonne{
    private $codeAcces;
    private $nom;
    private $prenom;
    private $dateDebutAbo;
    private $datefinAbo;
    private $creditTemps;
    private $montantADebiter;
    private $velo;


    public function emprunterVelo($velo){
        $res = false;
        if(!is_null($velo)){
            $this->velo = $velo;
            $res = true;
        }
        return $res;
    }

    public function deposerVelo($plot){
        $res = false;
        if(!is_null($this->velo)){
            $plot->setNUMV($this->velo);
            $this->velo = null;
            $res = true;
        }
        return $res;
    }

    /**
     * abonne constructor.
     * @param $codeAcces
     */

    public function __construct($codeAcces)
    {
        $this->codeAcces = $codeAcces;
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
    public function getVelo()
    {
        return $this->velo;
    }

    /**
     * @param mixed $velo
     */
    public function setVelo($velo)
    {
        $this->velo = $velo;
    }

    /**
     * @return mixed
     */
    public function getCodeAcces()
    {
        return $this->codeAcces;
    }

    /**
     * @param mixed $codeAcces
     */
    public function setCodeAcces($codeAcces)
    {
        $this->codeAcces = $codeAcces;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDateDebutAbo()
    {
        return $this->dateDebutAbo;
    }

    /**
     * @param mixed $dateDebutAbo
     */
    public function setDateDebutAbo($dateDebutAbo)
    {
        $this->dateDebutAbo = $dateDebutAbo;
    }

    /**
     * @return mixed
     */
    public function getDatefinAbo()
    {
        return $this->datefinAbo;
    }

    /**
     * @param mixed $datefinAbo
     */
    public function setDatefinAbo($datefinAbo)
    {
        $this->datefinAbo = $datefinAbo;
    }

    /**
     * @return mixed
     */
    public function getCreditTemps()
    {
        return $this->creditTemps;
    }

    /**
     * @param mixed $creditTemps
     */
    public function setCreditTemps($creditTemps)
    {
        $this->creditTemps = $creditTemps;
    }

    /**
     * @return mixed
     */
    public function getMontantADebiter()
    {
        return $this->montantADebiter;
    }

    /**
     * @param mixed $numTelephone
     */
    public function setMontantADebiter($montantADebiter)
    {
        $this->montantADebiter = $montantADebiter;



    }


}