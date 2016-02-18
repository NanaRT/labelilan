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
    private $places;
	private $category;
	private $organizer;
    private $image;
    private $uploadDir;
    private $description;
    private $player;

    public function __construct()
    {
        $this->image = new Image($this->getUploadDir());
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
     * @return Game
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
     * @return Game
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

    /**
     * Set places
     *
     * @param integer $places
     *
     * @return Game
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return integer
     */
    public function getPlaces()
    {
        return $this->places;
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
     * @param  Player $player
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $player->setGame($this);
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
}

