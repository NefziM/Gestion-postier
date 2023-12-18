<?php

class heure_nuit{
     //declaration des attribut
    private $matricule;
    private $mois;
    private $annee;
    private $heure;
    private $gestionnaire;
    private $brut;
    private $reference;
    //Le constructeur de la class  heure_nuit
    function __construct($m,$mo,$an,$h,$gest,$b){
        $this->matricule=$m;
        $this->mois=$mo;
        $this->annee=$an;
        $this->heure=$h;
        $this->gestionnaire=$gest;
        $this->brut=$b;
        $this->reference=$r;
    }



    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of mois
     */ 
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set the value of mois
     *
     * @return  self
     */ 
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of heure
     */ 
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set the value of heure
     *
     * @return  self
     */ 
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get the value of gestionnaire
     */ 
    public function getGestionnaire()
    {
        return $this->gestionnaire;
    }

    /**
     * Set the value of gestionnaire
     *
     * @return  self
     */ 
    public function setGestionnaire($gestionnaire)
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    /**
     * Get the value of brut
     */ 
    public function getBrut()
    {
        return $this->brut;
    }

    /**
     * Set the value of brut
     *
     * @return  self
     */ 
    public function setBrut($brut)
    {
        $this->brut = $brut;

        return $this;
    }

    /**
     * Get the value of valide
     */ 
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set the value of valide
     *
     * @return  self
     */ 
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get the value of date_validation
     */ 
    public function getDate_validation()
    {
        return $this->date_validation;
    }

    /**
     * Set the value of date_validation
     *
     * @return  self
     */ 
    public function setDate_validation($date_validation)
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
}