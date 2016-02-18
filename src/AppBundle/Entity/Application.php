<?php

namespace AppBundle\Entity;

/**
 * Application
 */
class Application
{
    private $id;
    private $description;
    private $origin;
	private $user;
	private $team;


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
     * Set description
     *
     * @param string $description
     *
     * @return Application
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
     * Set origin
     *
     * @param string $origin
     *
     * @return Application
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }
	
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
	
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }
    public function getTeam()
    {
        return $this->team;
    }
}

