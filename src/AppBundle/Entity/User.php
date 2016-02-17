<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    private $interest;
	
    /**
     * @var int
     */
    protected $id;
	
    public function __construct() 
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param  Interest $interest
     */
    public function addInterest(\AppBundle\Entity\Interest $interest)
    {
        $game->setUser($this);
        $this->interest[] = $interest;
    }
	
    /**
     * @return ArrayCollection $game
     */
    public function getInterest()
    {
        return $this->interest;
    }
	
    public function removeInterest(\AppBundle\Entity\Interest $interest)
    {
        $this->interest->removeElement($interest);
    }
}