<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class CategorieManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Categorie";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT *
                    FROM categorie";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

        /**
         * Afficher categorie par l'id
         */

        public function findOneById($id_cat)
        {
            $sql = "SELECT *
            FROM categorie
            WHERE id_categorie = :id";
    
            return self::getOneOrNullResult(
                self::select(
                    $sql,
                    [":id" => $id_cat],
                    false
                ),
                self::$classname
            );
        }

      

        public function nbSujetByCat(){
            
            $sql = "SELECT c.titre, COUNT(s.categorieId) AS nbSujet
            FROM categorie c, sujet s
            WHERE s.categorieId = c.id_categorie
            GROUP BY s.categorieId";

            return self::getResults(
                self::select(
                    $sql,
                    null,
                    true
                ),
                self::$classname
            );
        }

    }