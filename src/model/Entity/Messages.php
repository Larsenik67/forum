<?php
namespace App\Entity;

class Messages extends AbstractEntity
{
    private $id;
    private $contenu;
    private $date;
    protected $user;
    protected $sujets;
    private $statut;


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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the value of sujet_id
     */ 
    public function getSujets()
    {
        return $this->sujets;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }
}
