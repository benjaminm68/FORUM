<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\Manager\CategorieManager;
use Model\Manager\SujetManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

class UtilisateurController
{

    //Afficher le page due profil

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

    //Afficher la page edit d'un profil
    public function editProfil()
    {
        return [
            "view" => "utilisateur/editProfil.php"
        ];
    }

    //Modifier l'email d'un user
    public function modifierEmail()
    {
        $email = $_POST['email'];
        $email = strtolower(filter_var($email, FILTER_VALIDATE_EMAIL));

        if ($email === "") {
            $_SESSION['error_new_mail'] = "";

            header("Location:?ctrl=utilisateur&method=modifForm&id=" . $_GET['id']);
            die;
        }

        $manager = new UtilisateurManager();

        // Si l'email existe déjà
        if ($manager->findByEmail($email)) {
            echo  $_SESSION['email_exist'] = "";
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
            die;
        } else {
            $manager->modifEmail($_GET['id'], $email);
            Session::setUser($_SESSION['user']->setEmail($email));
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
            die;
        }
    }


    //Modifier le pseudo d'un user
    public function modifierPseudo()
    {

        $pseudo = $_POST['pseudo'];
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);


        if ($pseudo === "") {
            $_SESSION['error_new_pseudo'] = "";

            header("Location:?ctrl=utilisateur&method=modifForm&id=" . $_GET['id']);
            die;
        }

        $manager = new UtilisateurManager();

        //Si le pseudo existe déjà
        if ($manager->findByPseudo($pseudo)) {
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
            $_SESSION['error'] = "";
            die;
        } else {
            $manager->modifPseudo($_GET['id'], $pseudo);
            Session::setUser($_SESSION['user']->setPseudo($pseudo));
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
            die;
        }
    }

    public function modifierAvatar()
    {

        $avatar = $_FILES['avatar'];
        $file_name = $_FILES['avatar']['name'];

        $tailleMax = 2097152;
        $type_autorise = [
            "png",
            "jpg",
            'jpeg'
        ];

        $manager = new UtilisateurManager();
        if ($_FILES['avatar']['size'] <= $tailleMax) {

            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if (in_array($extensionUpload, $type_autorise)) {

                $chemin = "public/img/" . $_FILES['avatar']['name'];

                $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                if ($result) {
                    $manager->modifAvatar($_GET['id'], $chemin);
                    Session::setUser($_SESSION['user']->setAvatar($chemin));
                    header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
                    die;
                } else {
                    header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
                    die;
                    //erreur importation
                }
            } else {
                header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
                die;
                //erreur format
            }
        } else {
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $_GET['id']);
            die;
            //fichier trop lourd
        }
    }

    //Modifier le mot de passe
    public function modifierMdp()
    {


        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
        $newmdp = filter_input(INPUT_POST, 'newmdp', FILTER_SANITIZE_STRING);
        $newmdp2 = filter_input(INPUT_POST, 'newmdp2', FILTER_SANITIZE_STRING);
        // $mdp = $_POST['mdp'];
        // $newmdp = $_POST['newmdp'];
        // $newmdp2 = $_POST['newmdp2'];
        $id = $_SESSION['user']->getId();

        //Si aucuns des champ n'est vide
        if (!empty($mdp) and !empty($newmdp) and !empty($newmdp2)) {
            //On vérifie le mdp en clair avec celui hash en bdd
            if (password_verify($mdp, $_SESSION['user']->getMdp())) {
                //On vérifie que les deux nouveau mdp corresponde et qu'il ont minimum 8 caractère
                if ($newmdp === $newmdp2 and $newmdp >= 8) {
                    $manager = new UtilisateurManager();
                    $newmdp = password_hash($newmdp, PASSWORD_BCRYPT);
                    $manager->modifMdp($id, $newmdp);

                    header("Location:?ctrl=utilisateur&method=editProfil&id=" . $id);
                    $_SESSION['newmdp_ok'] = "";
                    die;
                } else {
                    header("Location:?ctrl=utilisateur&method=editProfil&id=" . $id);
                    $_SESSION['error_newmdp_identique'] = "";
                    die;
                    //Erreur newmdp et newmdp2 ne corresponde pas
                }
            } else {
                header("Location:?ctrl=utilisateur&method=editProfil&id=" . $id);
                $_SESSION['error_mdp_bdd'] = "";
                die;
                //Erreur mdp correspond pas à celui en bdd
            }
        } else {
            header("Location:?ctrl=utilisateur&method=editProfil&id=" . $id);
            $_SESSION['error_champvide'] = "";
            die;
            
            //Un champs est vide !
        }
    }



    // Afficher profil d'un user
    public function profilUser()
    {

        $id = $_GET['id'];
        $manager2 = new UtilisateurManager();
        $nbMsg = $manager2->nbMsgByUser($_GET['id']);

        $manager = new UtilisateurManager();
        $nbSujet = $manager->nbSujetByUser($_GET['id']);

        $manager3 = new UtilisateurManager();
        $utilisateur = $manager3->findOneById($id);

        return [
            "view" => "utilisateur/profilUser.php",
            "data" => [
                "nbSujet" => $nbSujet,
                "nbMsg" => $nbMsg,
                "utilisateur" => $utilisateur
            ],
        ];
    }

    //Barre de recherher utilisateur

    public function rechercherUser(){
        $manager = new UtilisateurManager();
        $userfind = $manager->rechercher();

       

       
    }
}
