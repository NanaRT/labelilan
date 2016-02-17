<?php

namespace AppBundle\Entity;

/**
 * Game
 */
class Game
{
    private $id;
    private $name;
    private $systName;
	private $category;
	private $organizer;
    private $image;
    private $uploadDir;
    private $description;
    private $interest;

    public function __construct()
    {
        $this->image = new Image($this->getUploadDir());
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
     * @return Tournament
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
     * @return Tournament
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

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;

        return $this;
    }
    public function getOrganizer()
    {
        return $this->organizer;
    }
	
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;
        return $this;
    }
    public function getUploadDir()
    {
        return $this->uploadDir;
    }
	

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getImage()
    {
        return $this->image;

    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Organizer
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
     * @param  Interest $interest
     */
    public function addInterest(\AppBundle\Entity\Interest $interest)
    {
        $game->setGame($this);
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

