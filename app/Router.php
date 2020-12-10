<?php
    namespace App;

    abstract class Router
    {

        public static function CSRFProtection($csrf_token){
            if(!empty($_POST)){
                if(isset($_POST['csrf_token'])){
                    $form_csrf = $_POST['csrf_token'];
                    if(hash_equals($form_csrf, $csrf_token)){
                        return true;
                    }
                }
                return false;
            }
            return true;
        }
        
        public static function handleRequest($get){
            $ctrlname = "Controller\HomeController";
            $method = "index";
            
            if(isset($get['ctrl'])){
                $ctrlname = "Controller\\".ucfirst($get['ctrl'])."Controller";
            }
            
            $ctrl = new $ctrlname();

            if(isset($get['method']) && method_exists($ctrl, $get['method'])){
                $method = $get['method'];
            }
            
            return $ctrl->$method();
        }

        public static function redirectTo($ctrl = null, $method = null){

            header("Location:?ctrl=".$ctrl."&method=".$method);
            die();
           
        }

    }

    