<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\Manager\CategorieManager;
use Model\Manager\SujetManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

class ForumController
{

    public function index()
    {
        Router::redirectTo("accueil", "index");
    }

    /**
     * Afficher le profil d'un user avec statistique
     */

    public function afficherProfil()
    {

        $manager2 = new UtilisateurManager();
        $nbMsg = $manager2->nbMsgByUser($_GET['id']);

        $manager = new UtilisateurManager();
        $nbSujet = $manager->nbSujetByUser($_GET['id']);

        return [
            "view" => "utilisateur/profil.php",
            "data" => [
                "nbSujet" => $nbSujet,
                "nbMsg" => $nbMsg,
            ],
        ];
    }


    /**
     * Afficher liste des catégories
     */
    public function listCategorie()
    {

        $manager = new CategorieManager();
        $cat = $manager->findAll();

        return [
            "view" => "forum/categorie.php",
            "data" => [
                "categories" => $cat
            ],
            "titrePage" => "FORUM | Categorie(s)"
        ];
    }

    /**
     * Afficher liste des messages
     */

    public function listMessage()
    {

        $manager = new MessageManager();
        $message = $manager->findAll();

        return [
            "view" => "forum/message.php",
            "data" => [
                "messages" => $message
            ],
            "titrePage" => "FORUM | Messages"
        ];
    }

    /**
     * Afficher liste des utilisateurs
     */

    public function listUtilisateur()
    {

        $manager = new UtilisateurManager();
        $utilisateur = $manager->findAll();

        return [
            "view" => "forum/utilisateur.php",
            "data" => [
                "utilisateurs" => $utilisateur
            ],
            "titrePage" => "FORUM | Utilisateurs"
        ];
    }

    public function panelAdmin(){

        $manager = new UtilisateurManager();
        $utilisateur = $manager->findAll();

        return[
            "view" => "utilisateur/paneladmin.php",
            "data" => [
                "utilisateurs" => $utilisateur
            ],
        ];
    }
}
