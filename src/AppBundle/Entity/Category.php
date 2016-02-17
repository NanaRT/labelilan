<?php

namespace AppBundle\Entity;

/**
 * Category
 */
class Category
{
    private $id;
    private $name;
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
     * @return Category
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
     * @return Category
     */
    public function setSystName($systName)
    {
        $this->systName = $systName;

        return $this;
    }

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

