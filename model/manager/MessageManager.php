<?php

namespace Model\Manager;

use App\AbstractManager;
use App\Session;

class MessageManager extends AbstractManager
{
    private static $classname = "Model\Entity\Message";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    /*
        AFFICHER TOUT LES MESSAGES
                                    */
    public function findAll()
    {

        $sql = "SELECT contenu 
                FROM message";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function msgBySujet($id)
    {

        $sql = "SELECT *
        FROM message m
        WHERE m.sujetId = :id";

        return self::getResults(
            self::select(
                $sql,
                [":id" => $id],
                true
            ),
            self::$classname
        );
    }


    public function ajouterMessage($array)
    {

        $sql = "INSERT INTO message (contenu, sujetId, utilisateur_id)
        VALUES (:contenu, :sujet_id, :utilisateur_id)";

        return self::create(
            $sql,
            $array
        );
    }

    public function supprimerMsg($id)
    {

        $sql = "DELETE FROM `message`
        WHERE `sujetId` = :id";


        return self::delete($sql, [":id" => $id]);
    }
}
