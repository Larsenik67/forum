<?php
namespace App\Entity;

class Sujets extends AbstractEntity
{
    private $id;
    private $nom;
    private $date;
    protected $user;
    protected $categories;
    private $statut;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
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
     * Get the value of categories_id
     */ 
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }
}