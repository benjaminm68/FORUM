<?php

namespace Model\Manager;

use App\AbstractManager;

class SujetManager extends AbstractManager
{
    private static $classname = "Model\Entity\Sujet";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    /**
     * Afficher tout les sujets
     */
    public function findAll()
    {

        $sql = "SELECT *
        FROM sujet s";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function sujetByCategorie($id)
    {

        $sql = "SELECT *
            FROM sujet s
            WHERE s.categorieId = :id
            ORDER BY s.titre DESC";

        return self::getResults(
            self::select(
                $sql,
                [":id" => $id],
                true
            ),
            self::$classname
        );
    }

    /**
     * Afficher sujet par l'id
     */

    public function findOneById($id)
    {
        $sql = "SELECT *
        FROM sujet
        WHERE id_sujet = :id";

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
     * Ajouter un nouveau sujet
     **/
    public function ajouterSujet($array)
    {
        $sql = "INSERT INTO sujet(titre, categorieId, utilisateur_id, contenuSujet)
        VALUES (:titre, :categorie_id, :utilisateur_id, :contenuSujet)";

        return self::create(
            $sql,
            $array
        );
    }

    public function supprimerSujet($id)
    {

        $sql = "DELETE FROM `sujet`
        WHERE `id_sujet` = :id";


        return self::delete($sql, [":id" => $id]);
    }

    public function editerSujet($id, $titre, $contenuSujet)
    {
        $sql = "UPDATE sujet
        SET titre = :titre,
            contenuSujet = :contenuSujet
        WHERE id_sujet = :id";

        return self::update(
            $sql,
            [
                "id" => $id,
                "titre" => $titre,
                "contenuSujet" => $contenuSujet
            ]
        );
    }

    public function rechercher()
    {

        if(isset($_POST['q']) AND !empty($_POST['q'])){
           $q = htmlspecialchars($_POST['q']);
            $sql = "SELECT *
                FROM sujet
                WHERE titre LIKE '%$q%'";
        }

       

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }


    // public function nbMsg(){
    //     $sql = "SELECT COUNT(m.id_message) AS nbMessage
    //     FROM sujet s, message m
    //     WHERE m.sujetId = s.id_sujet
    //     GROUP BY m.sujetId";

    // return self::getResults(
    //     self::select(
    //         $sql,
    //         null,
    //         true
    //     ),
    //     self::$classname
    // );
    // }
}
