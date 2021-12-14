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
        $categories = $cmanager->findAllCategorie();
        
        return $this->render("forum/home.php", [
            "categories" => $categories
        ]);
    }

    //?ctrl=forum&action=categories&id=XX
    public function categories($id)
    {
        $smanager = new SujetsManager();
        $sujets = $smanager->findAllSubject($id);
        
        $cmanager = new CategoriesManager();
        $categorie = $cmanager->findOneById($id);
        
        return $this->render("forum/categorie.php", [
            "sujets" => $sujets,
            "categorie" => $categorie
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

    //?ctrl=forum&action=newSujets&id=XX
    public function newSujets($id)
    {
        $mmanager = new MessagesManager();
        $messages = $mmanager->findAllMessage($id);

        $smanager = new SujetsManager();
        $sujets = $smanager->findOneById($id);

        return $this->render("forum/newSujet.php", 
        [
            "messages" => $messages,
            "sujets" => $sujets
        ]);
    }

    //?ctrl=forum&action=addSujet&id=XX
    public function addSujet($id)
    {
        if(Form::isSubmitted()){
            $user = Session::get("user");
            $message = Form::getData("message", "text");
            $nom = Form::getData("nom", "text");
            
            if($message && isset($id) && isset($user)){
                $SujetManager = new SujetsManager; 
                $MessageManager = new MessagesManager();
                $CategorieManager = new CategoriesManager();

                $sujets_id = $SujetManager->findOneById($id)->getId();
                $user_id = $user->getId();
                $categories_id = $CategorieManager->findOneById($id)->getId();

                if($SujetManager->insertSujet($nom, $user_id, $categories_id)){

                    if($MessageManager->insertMessage($message, $user_id, $sujets_id)){
                        return $this->redirect("?ctrl=forum&action=sujets&id=".$id);
                    }
                    else $this->addFlash("error", "Erreur de BDD !!");
                }else $this->addFlash("error", "Erreur de BDD !!");
            }
            else return $this->redirect("?ctrl=forum&action=newSujet");
        }
        else return false;
    }

}