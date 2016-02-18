<?php

namespace AppBundle\Entity;

/**
 * Player
 */
class Player
{
    private $id;
    private $pseudo;
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

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Player
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
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

