<?php
class postierA{
    //décalartion des attributs
    private $matricule;
    private $date_absence;
    private $type_absence;
    private $duree_absence;
    private $etat_absence;
    private $id;
    //Constructeur de la classe portierA
    function __construct($m,$da,$ta,$duree,$ea){
        $this->matricule=$m;
        $this->date_absence=$da;
        $this->type_absence=$ta;
        $this->duree_absence=$duree;
        $this->etat_absence=$ea;
        $this->id=$id;
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
     * Get the value of type_absence
     */ 
    public function getType_absence()
    {
        return $this->type_absence;
    }

    /**
     * Set the value of type_absence
     *
     * @return  self
     */ 
    public function setType_absence($type_absence)
    {
        $this->type_absence = $type_absence;

        return $this;
    }

    /**
     * Get the value of duree_absence
     */ 
    public function getDuree_absence()
    {
        return $this->duree_absence;
    }

    /**
     * Set the value of duree_absence
     *
     * @return  self
     */ 
    public function setDuree_absence($duree_absence)
    {
        $this->duree_absence = $duree_absence;

        return $this;
    }

    /**
     * Get the value of raison
     */ 
   /* public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set the value of raison
     *
     * @return  self
     */ 
   /* public function setRaison($raison)
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get the value of date_absence
     */ 
    public function getDate_absence()
    {
        return $this->date_absence;
    }

    /**
     * Set the value of date_absence
     *
     * @return  self
     */ 
    public function setDate_absence($date_absence)
    {
        $this->date_absence = $date_absence;

        return $this;
    }

    /**
     * Get the value of etat_absence
     */ 
    public function getEtat_absence()
    {
        return $this->etat_absence;
    }

    /**
     * Set the value of etat_absence
     *
     * @return  self
     */ 
    public function setEtat_absence($etat_absence)
    {
        $this->etat_absence = $etat_absence;

        return $this;
    }

    /**
     * Get the value of id
     */ 
   public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
  public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}