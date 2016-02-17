<?php

namespace AppBundle\Entity;

/**
 * Organizer
 */
class Organizer
{
    private $id;
    private $name;
    private $systName;
    private $description;
    private $game;
    private $socialMedia;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
	
    public function __construct() 
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Organizer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set systName
     *
     * @param string $systName
     *
     * @return Organizer
     */
    public function setSystName($systName)
    {
        $this->systName = $systName;

        return $this;
    }

    /**
     * Get systName
     *
     * @return string
     */
    public function getSystName()
    {
        return $this->systName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Organizer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
 
    /**
     * @param Game $game
     */
    public function addGame(\AppBundle\Entity\Game $game)
    {
        $game->setOrganizer($this);
        $this->game[] = $game;
    }
	
    /**
     * @return ArrayCollection $game
     */
    public function getGame()
    {
        return $this->game;
    }
	
    public function removeGame(\AppBundle\Entity\Game $game)
    {
        $this->game->removeElement($game);
    }
 
    /**
     * @param SocialMedia $socialMedia
     */
    public function addSocialMedia(\AppBundle\Entity\SocialMedia $socialMedia)
    {
        $socialMedia->setOrganizer($this);
        $this->socialMedia[] = $socialMedia;
    }
	
    /**
     * @return ArrayCollection $socialMedia
     */
    public function getSocialMedia()
    {
        return $this->socialMedia;
    }
	
    public function removeSocialMedia(\AppBundle\Entity\SocialMedia $socialMedia)
    {
        $this->socialMedia->removeElement($socialMedia);
    }
	
}

