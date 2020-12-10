<?php
    namespace App;

    session_start();

    abstract class Session 
    {
        //la méthode qui nous permet de récupérer le user en session
        public static function getUser(){
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
                return $_SESSION['user'];
            }
            return false;
        }

        public static function setUser($user){
            $_SESSION['user'] = $user;
        }

        public static function removeUser(){
            if(self::getUser()){
                unset($_SESSION['user']);
                session_destroy();
            }
            return;
        }
        
        public static function authenticationRequired($roleToHave){
            if(!self::getUser()){
                Router::redirectTo("security", "connexion");
            }
        }

        public static function generateKey(){
            if(!isset($_SESSION['key']) || $_SESSION['key'] === null){
                $_SESSION['key'] = bin2hex(random_bytes(32));
            }
        }

        public static function getKey(){
            return $_SESSION['key'];
        }
    }