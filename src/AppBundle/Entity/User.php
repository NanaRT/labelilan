<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    protected $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $player;
    private $application;
    private $payed;
    private $confirmation;
    private $mailPayed;
    private $alert;
    private $ordering;
	
    public function __construct()
    {
        $this->application = new \Doctrine\Common\Collections\ArrayCollection();
        $this->player = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->getConfirmationToken();
        $this->enabled = false;
        $this->locked = false;
        $this->expired = false;
        $this->roles = array();
        $this->credentialsExpired = false;
	}
	
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
	
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }
	
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
	
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
 
    /**
     * @param  Player $player
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $player->setUser($this);
        $this->player[] = $player;
    }
	
    /**
     * @return ArrayCollection $player
     */
    public function getPlayer()
    {
        return $this->player;
    }
	
    public function removePlayer(\AppBundle\Entity\Player $player)
    {
        $this->player->removeElement($player);
    }
	
    /**
     * @param  Application $application
     */
    public function addApplication(\AppBundle\Entity\Application $application)
    {
        $application->setUser($this);
        $this->application[] = $application;
    }
	
    /**
     * @return ArrayCollection $application
     */
    public function getApplication()
    {
        return $this->application;
    }
	
    public function removeApplication(\AppBundle\Entity\Application $application)
    {
        $this->application->removeElement($application);
    }
	
	
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    public function getPayed()
    {
        return $this->payed;
    }
	
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    public function getConfirmation()
    {
        return $this->confirmation;
    }
	
    public function setMailPayed($mailPayed)
    {
        $this->mailPayed = $mailPayed;

        return $this;
    }

    public function getMailPayed()
    {
        return $this->mailPayed;
    }
	
	
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    public function getAlert()
    {
        return $this->alert;
    }
 
    /**
     * @param  Ordering $ordering
     */
    public function addOrdering(\AppBundle\Entity\Ordering $ordering)
    {
        $ordering->setUser($this);
        $this->ordering[] = $ordering;
    }
	
    /**
     * @return ArrayCollection $ordering
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
	
    public function removeOrdering(\AppBundle\Entity\Ordering $ordering)
    {
        $this->ordering->removeElement($ordering);
    }
}