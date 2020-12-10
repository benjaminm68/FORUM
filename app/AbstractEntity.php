<?php
    namespace App;

    abstract class AbstractEntity {
            // création d'un hydrateur récursif! But: faire comprendre que notre clé étrangère récupère
            //
            protected function hydrate($data){
        
            foreach($data as $field => $value) {
                // ex : user_id => ["user","id"]
                $fieldArray = explode("_", $field);
                // cas d'une clé étrangère (ex : user_id)
                if(isset($fieldArray[1]) && $fieldArray[1] == "id") {
                    // UserManager (fieldArray[0] = "user", fieldArray[1] = "id") position zero est 
                    // de la colonne
                    $manName = ucfirst($fieldArray[0])."Manager";
                    // Model\Manager\UserManager
                    $FQCName = "Model\Manager".DS.$manName;
                    // $man = new Model\Manager\UserManager() 
                    $man = new $FQCName();
                    // $value = $man->findOneById($value)
                    $value = $man->findOneById($value);
                }

                // fielArray = userName
                // method = setUserName
                $method = "set".ucfirst($fieldArray[0]);
                
                // user->setUsername("stephane");
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }
    }