<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\Entity\Connexion;
use Model\Entity\Utilisateur;
use Model\Manager\TopicManager;
use Model\Manager\PostManager;

use Model\Manager\CategorieManager;
use Model\Manager\SujetManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;
use Model\Manager\ConnexionManager;
use Model\Manager\inscriptionManager;


class SecurityController
{

    /**
     * Afficher la page connexion
     */
    public function connexion()
    {
        return [
            "view" => "connexion/connexion.php",
            "data" => null,
            "titrePage" => "Connexion"
        ];
    }

    /**
     * Afficher la page d'inscription
     */

    public function inscription()
    {
        return [
            "view" => "connexion/inscription.php",
            "data" => null,
            "titrePage" => "Inscription"
        ];
    }

    /**
     * Enregistrer un utilisateur
     */

    public function addUser()
    {
        
        
        //Récuprérer les infos de $_POST
        foreach ($_POST as $key => $val) {
            if (!empty($val)) {
                ${$key} = $val;
            } 
        }
        

        //Vérifier si l'utilisateur existe déjà par l'email ou le pseudo
        //Initialiser le manager -> findByEmail

        $manager = new UtilisateurManager();
        if ($manager->findByEmail($email)) {
           echo  $_SESSION['email_exist'] = "";
            return Router::redirectTo('security', 'inscription');
        
        }
        //Si le pseudo existe déjà
        if ($manager->findByPseudo($pseudo)) {
           echo  $_SESSION['pseudo_exist'] = "";
            return Router::redirectTo('security', 'inscription');
            
        }
        if(strlen($mdp) < 8){
           echo  $_SESSION['error_mdp_taille'] = "";
            return Router::redirectTo('security', 'inscription');
            
        }
        //Si le mot de passe n'est pas égale au deuxieme mot de passe et qu'il 
        if ($mdp !== $mdp2) {
            echo $_SESSION['error_mdp'] = "";
            return Router::redirectTo('security', 'inscription');
        }

        
        //Crypter le mot de passe
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        //Initialise un manager et on lance la méthode pour la requête

        //Nettoyer les données et vérifier les infos
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        //Nettoyer les données et vérifier les infos
        $email = strtolower(filter_var($email, FILTER_VALIDATE_EMAIL));
        if (!$email) {
            var_dump($email);
            die;
        }

        //lance la requête
        $params = [
            "pseudo" => $pseudo,
            "email" => $email,
            "mdp" => $mdp
        ];

        if ($manager->register($params)) {
            echo $_SESSION['inscription_ok'] = "";
            return Router::redirectTo('security', 'connexion');

        } else {
            echo $_SESSION['inscription_fail'] = "";
            return Router::redirectTo('security', 'inscription');
        }

    }



    public function login()
    {
        
       
        $manager = new UtilisateurManager();

        //On récupère les données de $_POST qu'on stock dans des variables
        foreach ($_POST as $key => $val) {
            ${$key} = htmlspecialchars($val);
        }
        
        // Si un des champs est vide alors on envoi un message d'erreur + redirection
        if (empty($email) or empty($mdp)) {
            $_SESSION['champ_vide'];
            return Router::redirectTo('security', 'connexion');
        }

        //On passe l'email en full minuscule, et on vérifie la validité celui ci
        $email = strtolower(filter_var($email, FILTER_SANITIZE_STRING));
        if (!$email) {
            var_dump($email);
            die;
        }

        //rechercher si user existe avec email correspondant ou pseudo correspondant
        $params = [
            "email" => $email
        ];

        $utilisateur = $manager->connexion($params);
        
        if ($utilisateur) {

            //Si un résultat correspond
            //password_verify(mot_de_passe_en_clair, mdp_hash)
            if (password_verify($mdp, $utilisateur->getMdp())) {
                $_SESSION['user'] = $utilisateur;
                return Router::redirectTo('home', 'index');
            } else {
                echo $_SESSION['error_mdp'] = "";
                return Router::redirectTo('security', 'connexion');
            }
        } else {
            echo $_SESSION['error'] = "";
            return Router::redirectTo('security', 'connexion');
        }
    }

    public function logout(){
        Session::removeUser();
        Router::redirectTo('security', 'connexion');
    }
}
