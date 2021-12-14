<?php
namespace App\Controller;

use App\Service\Session;
use App\Service\Form;
use App\Manager\CategoriesManager;
use App\Manager\SujetsManager;
use App\Manager\MessagesManager;

class AdminController extends AbstractController
{
    //?ctrl=admin&action=index
    public function index()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $cmanager = new CategoriesManager();
        $smanager = new SujetsManager();
        $mmanager = new MessagesManager();

        $categories = $cmanager->findAll();
        $sujets = $smanager->findAll();
        $messages = $mmanager->findAll();

        return $this->render("admin/home.php", [
            "categories"   => $categories,
            "sujets" => $sujets,
            "messages" => $messages
        ]);
    }

    //?ctrl=admin&action=addCategorie
    public function addCategorie()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $nom = Form::getData("message", "text");

            if($nom){
                $manager = new CategoriesManager();
                if($manager->insertCategories($nom)){ 
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    //?ctrl=admin&action=disableCategorie
    public function disableCategorie()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $id = Form::getData("id", "int");
            $statut = Form::getData("statut", "int");

            if($id && isset($statut)){
                $manager = new categoriesManager();
                if($manager->updateCategorie($statut, $id)){ 
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    //?ctrl=admin&action=disableSujet
    public function disableSujet()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $id = Form::getData("id", "int");
            $statut = Form::getData("statut", "int");

            if($id && isset($statut)){
                $manager = new SujetsManager();
                if($manager->updateSujet($statut, $id)){ 
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    //?ctrl=admin&action=disableMessage
    public function disableMessage()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $id = Form::getData("id", "int");
            $statut = Form::getData("statut", "int");

            if($id && isset($statut)){
                $manager = new MessagesManager();
                if($manager->updateMessage($statut, $id)){ 
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }
}