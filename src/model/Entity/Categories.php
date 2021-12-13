<?php
namespace App\Entity;

class Categories extends AbstractEntity
{
    private $id;
    private $nom;
    private $statut;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }
}