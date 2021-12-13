<?php 
namespace App\Controller;

use App\Manager\CategoriesManager;
use App\Manager\SujetsManager;
use App\Manager\MessagesManager;
use App\Service\Session;
use App\Service\Form;


class ForumController extends AbstractController
{
    //?ctrl=forum&action=index
    public function index()
    {
        $cmanager = new CategoriesManager();
        $categories = $cmanager->findAll();
        
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
            "sujets" => $sujets,
        ]);
    }

    //?ctrl=forum&action=addMessage&id=XX
    public function addMessage($id)
    {
        if(Form::isSubmitted()){
            $user = Session::get("user");
            $message = Form::getData("message", "text");
            if($message && isset($id) && isset($user)){
                $sujet = new SujetsManager; 
                $MessageManager = new MessagesManager();

                $sujets_id = $sujet->findOneById($id)->getId();
                $user_id = $user->getId();

                if($MessageManager->insertMessage($message, $user_id, $sujets_id)){
                    return $this->redirect("?ctrl=forum&action=sujets&id=".$id);
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else return $this->redirect("?ctrl=forum");
        }
        else return false;
    }

}