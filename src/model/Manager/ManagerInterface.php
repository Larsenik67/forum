<?php
namespace App\Manager;

interface ManagerInterface
{
    public function __construct();

    public function findAll();

    public function findAllSubject($id);

    public function findAllMessage($id);

    public function findOneById($id);
}