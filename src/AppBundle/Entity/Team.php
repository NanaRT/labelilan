<?php

namespace AppBundle\Entity;

/**
 * Team
 */
class Team
{
    private $id;
    private $name;
    private $player;
    private $application;

    public function __construct()
    {
        $this->application = new \Doctrine\Common\Collections\ArrayCollection();
        $this->player = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
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
     * @param  Player $player
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $player->setTeam($this);
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
        $application->setTeam($this);
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
}

