<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pizza
 */
class Pizza
{
    private $id;
    private $name;
    private $description;
    private $stock;
    private $ordering;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }
 
    /**
     * @param  Ordering $ordering
     */
    public function addOrdering(\AppBundle\Entity\Ordering $ordering)
    {
        $ordering->setPizza($this);
        $this->ordering[] = $ordering;
    }
	
    /**
     * @return ArrayCollection $ordering
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
	
    public function removeOrdering(\AppBundle\Entity\Ordering $ordering)
    {
        $this->ordering->removeElement($ordering);
    }
}
