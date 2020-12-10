<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class ConnexionManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Connexion";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function connexionInfo(){

            $sql = "SELECT *
                    FROM utilisateur";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

    }