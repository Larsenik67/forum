<?php
namespace App\Manager;

class MembresManager extends AbstractManager implements ManagerInterface
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Membres",
            "SELECT * FROM membres"
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Membres",
            "SELECT * FROM membres WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }
}