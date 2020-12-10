<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\Manager\CategorieManager;
use Model\Manager\SujetManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

class MessageController
{

    /**
     * Ajouter un message
     */

     

    public function ajoutMessage(){

        if($_POST['titre'] === "" || $_POST['message'] === ""){
            $_SESSION['error_edit'];
            
            header("Location:?ctrl=message&method=msgBySujet&id=".$_GET['id']."&id_cat=".$_GET['id_cat']);
            die;
        }
     
        $params = [
            "contenu" => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING),
            "sujet_id" => $_GET['id'],
            "utilisateur_id" => $_SESSION['user']->getId()
        ];

        $manager = new MessageManager();
        $manager->ajouterMessage($params);

        header("Location:?ctrl=message&method=msgBySujet&id=".$_GET['id']."&id_cat=".$_GET['id_cat']);
        die;
    }

    /**
     * Afficher les messages d'un sujet
     */
    
    public function msgBySujet(){

        $manager = new MessageManager();
        $msgBySujet = $manager->msgBySujet($_GET['id']);

        $manager2 = new SujetManager();
        $sujet = $manager2->findOneById($_GET['id']);

        $manager3 = new CategorieManager();
        $cat = $manager3->findOneById($_GET['id_cat']);

        

        return [
            "view" => "forum/afficherSujet.php", 
            "data" => [
                "messages" => $msgBySujet,
                "sujet" => $sujet,
                "categorie" => $cat
            ],
            "titrePage" => "FORUM | sujet"
        ];
     }

     public function supprimerMsgBySujet(){
         
        $manager = new MessageManager();
        $suppMsg = $manager->supprimerMsg($_GET['id']);

        return Router::redirectTo('home', 'index');
     }
    
}
