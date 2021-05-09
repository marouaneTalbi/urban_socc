<?php

class Reservation {

    private $id_res;
    private $match;
    private $client;
    private $date;
    private $heure;
    private $dure;
    private $disponible;

    public function __construct()
    {
        $this->match = new Matchs();
        $this->client = new Client();

    }

    /**
     * Get the value of id
     */ 
    public function getId_res()
    {
        return $this->id_res;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId_res($id_res)
    {
        $this->id_res = $id_res;

        return $this;
    }

    /**
     * Get the value of match
     */ 
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Set the value of match
     *
     * @return  self
     */ 
    public function setMatch($match)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

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
     * Get the value of dure
     */ 
    public function getDure()
    {
        return $this->dure;
    }

    /**
     * Set the value of dure
     *
     * @return  self
     */ 
    public function setDure($dure)
    {
        $this->dure = $dure;

        return $this;
    }

    /**
     * Get the value of disponible
     */ 
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set the value of disponible
     *
     * @return  self
     */ 
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }
}