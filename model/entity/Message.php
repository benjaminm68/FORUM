<?php 

namespace Model\Entity;


use App\AbstractEntity;


class Message extends AbstractEntity{

    private $id;
    private $contenu;
    private $dateCreation;
    private $sujetId;
    private $utilisateur;
    

    public function __construct($data){
        $this->hydrate($data);
    }
    
    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation($format)
    {
        return $this->dateCreation->format($format);
    }


    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = new \DateTime($dateCreation);

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    


    /**
     * Get the value of utilisateur_id
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur_id
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }


    /**
     * Get the value of sujetId
     */ 
    public function getSujetId()
    {
        return $this->sujetId;
    }

    /**
     * Set the value of sujetId
     *
     * @return  self
     */ 
    public function setSujetId($sujetId)
    {
        $this->sujetId = $sujetId;

        return $this;
    }
}
