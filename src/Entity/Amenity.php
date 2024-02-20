<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmenityRepository")
 */
class Amenity
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Property", mappedBy="amenities")
     */
    private $properties;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibleRent;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibleSale;

    /**
     * @ORM\Column(type="integer")
     */
    private $showOrder;

    /**
     * @return boolean
     */
    public function isVisibleRent() {
        return $this->visibleRent;
    }

    /**
     * @param boolean $visibleRent
     */
    public function setVisibleRent($visibleRent): void {
        $this->visibleRent = $visibleRent;
    }

    /**
     * @return boolean
     */
    public function isVisibleSale() {
        return $this->visibleSale;
    }

    /**
     * @param boolean $visibleSale
     */
    public function setVisibleSale($visibleSale): void {
        $this->visibleSale = $visibleSale;
    }

    /**
     * @return integer
     */
    public function getShowOrder() {
        return $this->showOrder;
    }

    /**
     * @param string $showOrder
     */
    public function setShowOrder($showOrder): void {
        $this->showOrder = $showOrder;
    }

    public function __construct()
    {
        $this->properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Property[]
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties[] = $property;
            $property->addAmenity($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        if ($this->properties->contains($property)) {
            $this->properties->removeElement($property);
            $property->removeAmenity($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->'string ' . name;
    }
}
