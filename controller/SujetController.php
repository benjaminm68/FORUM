<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\Manager\CategorieManager;
use Model\Manager\SujetManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

class SujetController
{

    /**
     * Afficher liste des sujets
     */
    public function listSujet()
    {

        $manager = new SujetManager();
        $sujet = $manager->findAll();

        return [
            "view" => "forum/sujet.php",
            "data" => [
                "sujets" => $sujet
            ],
            "titrePage" => "FORUM | Sujets"
        ];
    }


    /**
     * Afficher liste des sujets par catégorie
     */
    public function listSujetByCat()
    {

        $manager = new SujetManager();
        $sujetByCat = $manager->sujetByCategorie($_GET['id']);

        $manager2 = new CategorieManager();
        $cat = $manager2->findOneById($_GET['id']);


        return [
            "view" => "forum/sujetByCat.php",
            "data" => [
                "categorie" => $cat,
                "sujetByCat" => $sujetByCat
            ],
            "titrePage" => "FORUM | sujet"
        ];
    }



    /**
     * Afficher formulaire pour créer un nouveau sujet
     */

    public function afficherCreerSujet()
    {

        $manager3 = new CategorieManager();
        $cat = $manager3->findOneById($_GET['id_cat']);

        return [
            "view" => "forum/creerSujet.php",
            "data" => [
                "categorie" => $cat
            ],
        ];
    }


    /**
     * Créer un nouveau sujet
     */

    public function CreerNouveauSujet()
    {

        
        $manager3 = new CategorieManager();
        $cat = $manager3->findOneById($_GET['id_cat']);
        
        if($_POST['titre'] === "" || $_POST['message'] === ""){
            $_SESSION['error_edit'];
            return Router::redirectTo('sujet', 'afficherEditerSujet');
        }
        
        $params = [
            "titre" => filter_INPUT(INPUT_POST, 'titre', FILTER_SANITIZE_STRING),
            "categorie_id" => $_GET['id_cat'],
            "utilisateur_id" => $_SESSION['user']->getId(),
            "contenuSujet" => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)
        ];
        
        $manager = new SujetManager();
        $newSujet = $manager->ajouterSujet($params);

        header("Location:?ctrl=sujet&method=listSujetByCat&id=".$_GET['id_cat']);
            die;
    }


    /**
     * Afficher formulaire editer un sujet
     */
    public function afficherEditerSujet()
    {

        $manager3 = new CategorieManager();
        $cat = $manager3->findOneById($_GET['id_cat']);

        $manager = new SujetManager();
        $editSujet = $manager->findOneById($_GET['id']);

        return [
            "view" => "forum/editerSujet.php",
            "data" => [
                "categorie" => $cat,
                "editSujet" => $editSujet
            ],
        ];
    }


    public function editerSujet(){

        

        //Netoyyer les variables de post Et GET
        $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_SPECIAL_CHARS);
        $contenuSujet = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        
      if($titre === "" || $contenuSujet === ""){
          $_SESSION['error_edit'];
          

          header("Location:?ctrl=sujet&method=afficherEditerSujet&id=".$_GET['id']."&id_cat=".$_GET['id_cat']);
            die;
      }
        
        $manager = new SujetManager();
        $editSujet = $manager->editerSujet($_GET['id'], $titre, $contenuSujet);

        return Router::redirectTo('sujet', 'listSujet');
    }


    /**
     * Supprimer un sujet
     */
    public function supprimerSujet()
    {

        $manager2 = new MessageManager();
        $suppMsg = $manager2->supprimerMsg($_GET['id']);

        $manager = new SujetManager();
        $manager->supprimerSujet($_GET['id']);

        header("Location:?ctrl=sujet&method=listSujetByCat&id=".$_GET['id_cat']);
        die;
    }


    /**
     * Compteur de sujet par catégorie
     */
    public function compteurSujet()
    {

        $manager = new CategorieManager();
        $nbSujet = $manager->nbSujetByCat();

        return [
            "view" => "forum/categorie.php",
            "data" => [
                "nbsujet" => $nbSujet,
            ],
            "titrePage" => "FORUM | sujet"
        ];
    }

    /**
         * Rechercher un sujet
         */

        public function rechercherSujet(){

            $manager2 = new SujetManager();
            $sujetFind = $manager2->findAll();

            $manager = new SujetManager();
            $recherche = $manager->rechercher();

            return [
                "view" => "forum/recherche.php", 
                "data" => [
                    "sujet" => $sujetFind,
                    "recherche" => $recherche
                ],
            ];
        }


}
