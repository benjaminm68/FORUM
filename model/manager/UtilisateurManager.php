<?php

namespace Model\Manager;

use App\AbstractManager;

class UtilisateurManager extends AbstractManager
{
    private static $classname = "Model\Entity\Utilisateur";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    /**
     * Afficher tous les utilisateurs
     */
    public function findAll()
    {

        $sql = "SELECT *
                FROM utilisateur";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    /**
     * Afficher un utilisateur par son id
     */
    public function findOneById($id)
    {
        $sql = "SELECT *
        FROM utilisateur
        WHERE id_utilisateur = :id";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":id" => $id],
                false
            ),
            self::$classname
        );
    }


    /**
     * Trouver un utilisateur par son email 
     **/

    public function findByEmail($email)
    {

        $sql = "SELECT email
                FROM utilisateur
                WHERE email = :email";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":email" => $email],
                false
            ),
            self::$classname
        );
    }

    /**
     * Trouver un utilisateur par son pseudo
     **/
    public function findByPseudo($pseudo)
    {

        $sql = "SELECT pseudo
                FROM utilisateur
                WHERE pseudo = :pseudo";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":pseudo" => $pseudo],
                false
            ),
            self::$classname
        );
    }

    /**
     * Enregistrer un nouvel utilisateur
     **/
    public function register($array)
    {
        $sql = "INSERT INTO utilisateur (pseudo, email, mdp)
                VALUES (:pseudo, :email, :mdp)";

        return self::create(
            $sql,
            $array
        );
    }


    /**
     * Connexion d'un utilisateur
     **/
    public function connexion($var)
    {

        $sql = "SELECT *
        FROM utilisateur 
        WHERE email = :email OR pseudo = :email";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                $var,
                false
            ),
            self::$classname
        );
    }


    /**
     * Nombre de sujet d'un utilisateur
     **/
    public function nbSujetByUser($id)
    {

        $sql = "SELECT COUNT(s.id_sujet) AS nbSujet
                FROM sujet s
                WHERE s.utilisateur_id = :id";


        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":id" => $id],
                false
            ),
            self::$classname
        );
    }


    /**
     * Nombre de messages d'un utilisateur
     **/
    public function nbMsgByUser($id)
    {

        $sql = "SELECT COUNT(m.id_message) AS nbMsg
        FROM message m
        WHERE m.utilisateur_id = :id";


        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":id" => $id],
                false
            ),
            self::$classname
        );
    }

    // Modifier l'email

    public function modifEmail($id, $email)
    {

        $sql = "UPDATE utilisateur
                SET email = :email
                WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                "id" => $id,
                "email" => $email,
            ]
        );
    }

    //Modifier le pseudo
    public function modifPseudo($id, $pseudo)
    {

        $sql = "UPDATE utilisateur
            SET pseudo = :pseudo
            WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                "id" => $id,
                "pseudo" => $pseudo,
            ]
        );
    }

    //Modifier l'avatar
    public function modifAvatar($id, $avatar)
    {

        $sql = "UPDATE utilisateur
        SET avatar = :avatar
        WHERE id_utilisateur = :id";


        return self::update(
            $sql,
            [
                "id" => $id,
                "avatar" => $avatar,
            ]
        );
    }

    //Modifier mot de passe

    public function modifMdp($id, $newmdp){

        $sql = "UPDATE utilisateur
                SET mdp = :mdp
                WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                "id" => $id,
                "mdp" => $newmdp
            ]
            );
    }

    //Rechercher un utilisateur
    public function rechercher()
    {

        $input = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

        if(isset($_POST['search']) AND !empty($_POST['search'])){
           
            $sql = "SELECT *
                FROM utilisateur
                WHERE pseudo LIKE ':input'";
        }

       

        return self::getResults(
            self::select(
                $sql,
                [
                    ':input' => $input
                ],
                true
            ),
            self::$classname
        );
    }
}
