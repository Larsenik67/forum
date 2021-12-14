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
            "SELECT * FROM categories"
        );
    }

    public function findAllCategorie()
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

    public function insertCategories($nom)
    {
        return $this::executeQuery(
            "INSERT INTO categories (nom) VALUES (:n)",
            [
                ":n" => $nom
            ]
        );
    }

    public function updateCategorie($statut, $id)
    {
        return $this::executeQuery(
            "UPDATE categories SET statut = :s WHERE id = :id",
            [
                ":s" => $statut,
                ":id" => $id
            ]
        );
    }
}