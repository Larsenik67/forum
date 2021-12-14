<?php
namespace App\Manager;

class SujetsManager extends AbstractManager implements ManagerInterface
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Sujets",
            "SELECT * FROM sujets" 
        );
    }
    
    public function findAllSubject($id)
    {
        return $this::getResults(
            "App\\Entity\\Sujets",
            "SELECT * FROM sujets WHERE statut = 0 AND categories_id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Sujets",
            "SELECT * FROM sujets WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function insertSujet($nom, $user_id, $categories_id){
        return $this::executeQuery(
            "INSERT INTO sujets (nom, user_id, categories_id) VALUES (:n, :ui, :ci)",
            [
                ":n" => $nom,
                ":ui" => $user_id,
                ":ci" => $categories_id
            ]
        );
    }

    public function updateSujet($statut, $id)
    {
        return $this::executeQuery(
            "UPDATE sujets SET statut = :s WHERE id = :id",
            [
                ":s" => $statut,
                ":id" => $id
            ]
        );
    }
}