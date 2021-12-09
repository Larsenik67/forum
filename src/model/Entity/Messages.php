<?php
namespace App\Entity;

class Messages extends AbstractEntity
{
    private $id;
    private $contenu;
    private $date;
    protected $membres;
    protected $sujets;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the value of membre_id
     */ 
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * Get the value of sujet_id
     */ 
    public function getSujets()
    {
        return $this->sujets;
    }
}
