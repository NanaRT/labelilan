<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Labeli
 */
class Labeli
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var boolean
     */
    private $honored;

    /**
     * @var boolean
     */
    private $noCotisation;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Labeli
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Labeli
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Labeli
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set honored
     *
     * @param boolean $honored
     * @return Labeli
     */
    public function setHonored($honored)
    {
        $this->honored = $honored;

        return $this;
    }

    /**
     * Get honored
     *
     * @return boolean 
     */
    public function getHonored()
    {
        return $this->honored;
    }
	
	
    public function setNoCotisation($noCotisation)
    {
        $this->noCotisation = $noCotisation;

        return $this;
    }

    public function getNoCotisation()
    {
        return $this->noCotisation;
    }
}
