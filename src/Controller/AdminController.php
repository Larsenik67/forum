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
            $nom = Form::getData("name", "text");

            if($nom){
                $manager = new CategoriesManager();
                if($newId = $manager->insertCategories($name, $text)){ //REPREND TON TAFF ICI ! (tu doit crée InsertCategories)
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=store&action=product&id=$newId");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    public function updateProduct($id)
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $pmanager = new ProductManager();

        if(Form::isSubmitted()){
            $name = Form::getData("name", "text");
            $price = Form::getData("price", "float", FILTER_FLAG_ALLOW_FRACTION);
            $descr = Form::getData("descr", "text");
            $cat_id = Form::getData("category", "int");

            if($name && $price && $descr && $cat_id){
            
                if($pmanager->updateProduct($id, $name, $price, $descr, $cat_id)){
                    $this->addFlash("success", "Le produit ".$name." a été modifié avec succès !!");
                    return $this->redirect("?ctrl=admin");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");
        }
        $products = $pmanager->findAll();

        $cmanager = new CategoryManager();
        $categories = $cmanager->findAll();
        
        $product = $pmanager->findOneById($id);

        return $this->render("admin/home.php", [
            "products"     => $products,
            "prodToUpdate" => $product,
            "categories"   => $categories
        ]);
    }

    public function deleteProduct($id){

        $manager = new ProductManager();
        $product = $manager->findOneById($id);

        if($manager->deleteProduct($id)){
            $this->addFlash("success", "Le produit ".$product->getName()." a été supprimé avec succès !!");
        }
        else $this->addFlash("error", "Erreur de BDD !!");

        return $this->redirect("?ctrl=admin");
    }
}