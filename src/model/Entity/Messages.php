<?php
namespace App\Entity;

class Messages extends AbstractEntity
{
    private $id;
    private $contenu;
    private $date;
    private $membre_id;
    private $sujet_id;


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
    public function getMembre_id()
    {
        return $this->membre_id;
    }

    /**
     * Get the value of sujet_id
     */ 
    public function getSujet_id()
    {
        return $this->sujet_id;
    }
}
