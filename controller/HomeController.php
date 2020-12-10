<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\CategorieManager;
    use Model\Manager\SujetManager;

class HomeController {

        /**
         * Afficher la page d'accueil avec le nom des catégories
         */
        public function index(){

            $manager = new CategorieManager();
            $cat = $manager->findAll();
            
            $manager2 = new CategorieManager();
            $nbSujetByCat = $manager2->nbSujetByCat();

            return [
                "view" => "forum/accueil.php", 
                "data" => [
                    "categories" => $cat,
                    "nbSujetByCat" => $nbSujetByCat
                ],
                "titrePage" => "FORUM |"
            ];
        }
        
    }