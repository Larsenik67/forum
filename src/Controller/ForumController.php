<?php 
namespace App\Controller;

use App\Manager\CategoriesManager;
use App\Manager\SujetsManager;
use App\Manager\MessagesManager;


class ForumController extends AbstractController
{
    //?ctrl=forum&action=index
    public function index()
    {
        $fmanager = new CategoriesManager();
        $categories = $fmanager->findAll();
        
        return $this->render("forum/home.php", [
            "categories" => $categories
        ]);
    }

    //?ctrl=forum&action=categories&id=XX
    public function categories($id)
    {
        $smanager = new SujetsManager();
        $sujets = $smanager->findAllSubject($id);
        
        return $this->render("forum/categorie.php", [
            "sujets" => $sujets
        ]);
    }

    //?ctrl=forum&action=sujets&id=XX
    public function sujets($id)
    {
        $mmanager = new MessagesManager();
        $messages = $mmanager->findAllMessage($id);

        $smanager = new SujetsManager();
        $sujets = $smanager->findOneById($id);

        return $this->render("forum/sujet.php", [
            "messages" => $messages,
            "sujets" => $sujets
        ]);
    }

     /**?ctrl=forum&action=categories&id=XX
     public function product($id)
     {
         $manager = new ForumManager();
         $sujet = $manager->findOneById($id);
 
         if(!$sujet) return false;
 
         return $this->render("forum/sujet.php", [
             "sujet" => $sujet
         ]);
     }**/
}