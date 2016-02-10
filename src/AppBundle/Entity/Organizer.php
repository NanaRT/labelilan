<?php

namespace AppBundle\Entity;

/**
 * Organizer
 */
class Organizer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $systName;

    private $game;

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
     * @param Game $game
     */
    public function addGame(\AppBundle\Entity\Game $game)
    {
        $game->setCategory($this);
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
	
}

