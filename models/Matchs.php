<?php

class Matchs{

    private $id_match;
    private $match_name;
    private $image;
    private $date;


    /**
     * Get the value of id_match
     */ 
    public function getId_match()
    {
        return $this->id_match;
    }

    /**
     * Set the value of id_match
     *
     * @return  self
     */ 
    public function setId_match($id_match)
    {
        $this->id_match = $id_match;

        return $this;
    }

    /**
     * Get the value of match_name
     */ 
    public function getMatch_name()
    {
        return $this->match_name;
    }

    /**
     * Set the value of match_name
     *
     * @return  self
     */ 
    public function setMatch_name($match_name)
    {
        $this->match_name = $match_name;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

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
}