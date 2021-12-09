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

    //?ctrl=forum&action=categories&id=XX
    public function categories($id)
    {
        $smanager = new ForumManager();
        $sujets = $smanager->findAllSubject($id);
        
        return $this->render("forum/categorie.php", [
            "sujets" => $sujets
        ]);
    }

    //?ctrl=forum&action=sujets&id=XX
    public function sujets($id)
    {
        $mmanager = new ForumManager();
        $messages = $mmanager->findAllMessage($id);
        
        return $this->render("forum/sujet.php", [
            "messages" => $messages
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