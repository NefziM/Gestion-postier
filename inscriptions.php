<?php

class inscriptions{
     //declaration des attribut
      private $id;
    private $matricule;
    private $mail;
    private $formation;
    //Le constructeur de la class inscriptions
    function __construct($m,$em,$f){
        $this->matricule=$m;
        $this->mail=$em;
        $this->formation=$f;
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
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of formation
     */ 
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set the value of formation
     *
     * @return  self
     */ 
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }
}