<?php 

namespace Model\Entity;


use App\AbstractEntity;


class Utilisateur extends AbstractEntity{

    private $id;
    private $pseudo;
    private $email;
    private $mdp;
    private $rang;
    private $avatar;
    private $dateInscription;
    private $nbSujet;
    private $nbMsg;

    public function __construct($data){
        $this->hydrate($data);
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of rang
     */ 
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set the value of rang
     *
     * @return  self
     */ 
    public function setRang($rang)
    {
        $this->rang = $rang;

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
     * Get the value of dateInscription
     */ 
    public function getDateInscription($format)
    {
        return $this->dateInscription->format($format);
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */ 
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = new \DateTime($dateInscription);

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
}