<?php 
namespace App\Controller;

use App\Manager\ForumManager;

class ForumController extends AbstractController
{
    //?ctrl=forum&action=index
    public function index()
    {
        $fmanager = new ForumManager();
        $categories = $fmanager->findAll();
        
        return $this->render("forum/home.php", [
            "categories" => $categories
        ]);
    }

     //?ctrl=store&action=product&id=XX
     public function product($id)
     {
         $manager = new ForumManager();
         $product = $manager->findOneById($id);
 
         if(!$product) return false;
 
         return $this->render("forum/sujet.php", [
             "sujet" => $sujet
         ]);
     }
}