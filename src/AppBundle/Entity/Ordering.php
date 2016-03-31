<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordering
 */
class Ordering
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $number;
	private $user;
	private $pizza;


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
     * Set number
     *
     * @param integer $number
     * @return Ordering
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
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
	
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;

        return $this;
    }
    public function getPizza()
    {
        return $this->pizza;
    }
}
