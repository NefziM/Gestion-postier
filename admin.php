<?php
class admin{
    //declaration des attribut
    private $log;
    private $pw;
    //Le constructeur de la class admin
    function __construct($log,$pw){
        $this->log=$log;
        $this->pw=$pw;
    }
    /**
     * Get the value of log
     */ 
    public function getLog()
    {
        return $this->log;
    }
    /**
     * Set the value of log
     *
     * @return  self
     */ 
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }
/**
     * Get the value of pw
     */ 
    public function getPw()
    {
        return $this->pw;
    }
/**
     * Set the value of pw
     *
     * @return  self
     */ 
    public function setPw($pw)
    {
        $this->pw = $PW;

        return $this;
    }
}