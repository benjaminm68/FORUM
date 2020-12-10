<?php 

namespace Model\Entity;


use App\AbstractEntity;


class Sujet extends AbstractEntity{

    private $id;
    private $titre;
    private $dateCreation;
    private $statut;
    private $categorieId;
    private $contenuSujet;
    private $utilisateurId;
    private $utilisateur;

    public function __construct($data){
        $this->hydrate($data);
    }
    
    /**
     * Get the value of id_sujet
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id_sujet
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of nbMsg
     */ 
    public function getNbMsg()
    {
        return $this->nbMsg;
    }

    /**
     * Set the value of nbMsg
     *
     * @return  self
     */ 
    public function setNbMsg($nbMsg)
    {
        $this->nbMsg = $nbMsg;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of contenuSujet
     */ 
    public function getContenuSujet()
    {
        return $this->contenuSujet;
    }

    /**
     * Set the value of contenuSujet
     *
     * @return  self
     */ 
    public function setContenuSujet($contenuSujet)
    {
        $this->contenuSujet = $contenuSujet;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get the value of categorieId
     */ 
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set the value of categorieId
     *
     * @return  self
     */ 
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get the value of utilisateurId
     */ 
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }

    /**
     * Set the value of utilisateurId
     *
     * @return  self
     */ 
    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }
    }
