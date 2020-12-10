<?php 

namespace Model\Entity;


use App\AbstractEntity;


class Categorie extends AbstractEntity{

    private $id;
    private $titre;
    private $icon;
    private $description;
    private $nbSujet;

    public function __construct($data){
        $this->hydrate($data);
    }


    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of id_categorie
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of icon
     */ 
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @return  self
     */ 
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of nbSujet
     */ 
    public function getNbSujet()
    {
        return $this->nbSujet;
    }

    /**
     * Set the value of nbSujet
     *
     * @return  self
     */ 
    public function setNbSujet($nbSujet)
    {
        $this->nbSujet = $nbSujet;

        return $this;
    }
}