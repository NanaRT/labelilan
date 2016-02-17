<?php

namespace AppBundle\Entity;

/**
 * Interest
 */
class Interest
{
    private $id;
	private $user;
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
	
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
	
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }
    public function getGame()
    {
        return $this->game;
    }
	
}

