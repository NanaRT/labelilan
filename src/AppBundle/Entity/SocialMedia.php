<?php

namespace AppBundle\Entity;

/**
 * SocialMedia
 */
class SocialMedia
{
    private $id;
    private $name;
    private $link;
    private $icon;
	private $organizer;


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
     * @return SocialMedia
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
     * Set link
     *
     * @param string $link
     *
     * @return SocialMedia
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return SocialMedia
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
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
}

