<?php
namespace App\Manager;

class MessagesManager extends AbstractManager implements ManagerInterface
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Messages",
            "SELECT * FROM messages"
        );
    }

    public function findAllMessage($id)
    {
        return $this::getResults(
            "App\\Entity\\Messages",
            "SELECT * FROM messages WHERE statut = 0 AND sujets_id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Messages",
            "SELECT * FROM messages WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }
}