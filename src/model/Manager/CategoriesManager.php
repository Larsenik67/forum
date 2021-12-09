<?php
namespace App\Manager;

class CategoriesManager extends AbstractManager implements ManagerInterface
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

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Categories",
            "SELECT * FROM categories WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }
}