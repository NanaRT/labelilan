<?php

namespace AppBundle\Entity;

/**
 * Partner
 */
class Partner
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    private $systName;

    /**
     * @var string
     */
    private $description;
    private $socialMedia;


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
     * @return Partner
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
	
    public function setSystName($systName)
    {
        $this->systName = $systName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSystName()
    {
        return $this->systName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Partner
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
     * @param SocialMedia $socialMedia
     */
    public function addSocialMedia(\AppBundle\Entity\SocialMedia $socialMedia)
    {
        $socialMedia->setPartner($this);
        $this->socialMedia[] = $socialMedia;
    }
	
    /**
     * @return ArrayCollection $socialMedia
     */
    public function getSocialMedia()
    {
        return $this->socialMedia;
    }
	
    public function removeSocialMedia(\AppBundle\Entity\SocialMedia $socialMedia)
    {
        $this->socialMedia->removeElement($socialMedia);
    }
	
}

