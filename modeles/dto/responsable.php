<?php
class responsable{
    private $codeAcces;
    private $nom;
    private $prenom;
    private $dateEmbauche;

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
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * @param mixed $dateEmbauche
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }





}