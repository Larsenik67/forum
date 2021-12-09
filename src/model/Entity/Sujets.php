<?php
namespace App\Entity;

class Sujets extends AbstractEntity
{
    private $id;
    private $nom;
    private $date;
    private $membre_id;
    private $categories_id;

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
    public function getMembre_id()
    {
        return $this->membre_id;
    }

    /**
     * Get the value of categories_id
     */ 
    public function getCategories_id()
    {
        return $this->categories_id;
    }
}