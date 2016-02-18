<?php

namespace AppBundle\Entity;

/**
 * Player
 */
class Player
{
    private $id;
    private $pseudo;
    private $capitain;
	private $user;
	private $game;
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
	
	
    public function setCapitain($capitain)
    {
        $this->capitain = $capitain;

        return $this;
    }

    public function getCapitain()
    {
        return $this->capitain;
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

