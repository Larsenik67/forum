<?php
namespace App\Manager;

class ForumManager extends AbstractManager implements ManagerInterface
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Categories",
            "SELECT * FROM categories WHERE statut = 0"
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

    public function findAllMessage($id)
    {
        return $this::getResults(
            "App\\Entity\\Messages",
            "SELECT * FROM messages WHERE statut = 0 AND sujet_id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Product",
            "SELECT * FROM product WHERE id = :id AND statut = 0",
            [
                ":id" => $id
            ]
        );
    }
}