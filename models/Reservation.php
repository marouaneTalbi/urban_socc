<?php

class Reservation {

    private $id_res;
    private $match;
    private $client;
    private $start;
    private $end;


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
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of end
     */ 
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */ 
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }
}