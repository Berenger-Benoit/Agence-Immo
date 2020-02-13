<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{

    /** 
     * @var int|null
     * @Assert\Range(min=10, minMessage="la valeur minimum est de 10 m²")
    */
    private $minSurface;

    /**
     * 
     *
     * @var int|null
     */
    private $maxPrice;

    /**
     * 
     *
     * @var ArrayCollection
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of tags
     *
     * @return  ArrayCollection
     */ 
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @param  ArrayCollection  $tags
     *
     * @return  self
     */ 
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;

        return $this;
    }
}