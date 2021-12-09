<?php
namespace App\Manager;

class ProductManager extends AbstractManager implements ManagerInterface
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Categories",
            "SELECT * FROM categories"
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Product",
            "SELECT * FROM product WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }
}