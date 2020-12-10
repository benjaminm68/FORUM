<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class InscriptionManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Inscription";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function inscriptionInfo(){

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