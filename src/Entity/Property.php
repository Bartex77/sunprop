<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PropertyStatus", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $propertyStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PropertyType", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PropertyType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ConstructionType", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constructionType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Town", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $town;

    /**
     * @ORM\Column(type="integer")
     */
    private $bedrooms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bathrooms;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PropertyFeatures", inversedBy="properties")
     */
    private $propertyFeatures;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $seaDistance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SeaDistanceUnit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seaDistanceUnit;

    /**
     * @ORM\Column(type="integer")
     */
    private $livingRooms;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxNumberOfPeople;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimumStay;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalEquipment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalServices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PriceInMonth", mappedBy="property", orphanRemoval=true)
     */
    private $priceInMonth;

    public function __construct()
    {
        $this->propertyFeatures = new ArrayCollection();
        $this->priceInMonth = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPropertyStatus(): ?PropertyStatus
    {
        return $this->propertyStatus;
    }

    public function setPropertyStatus(?PropertyStatus $propertyStatus): self
    {
        $this->propertyStatus = $propertyStatus;

        return $this;
    }

    public function getPropertyType(): ?PropertyType
    {
        return $this->PropertyType;
    }

    public function setPropertyType(?PropertyType $PropertyType): self
    {
        $this->PropertyType = $PropertyType;

        return $this;
    }

    public function getConstructionType(): ?ConstructionType
    {
        return $this->constructionType;
    }

    public function setConstructionType(?ConstructionType $constructionType): self
    {
        $this->constructionType = $constructionType;

        return $this;
    }

    public function getTown(): ?Town
    {
        return $this->town;
    }

    public function setTown(?Town $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getBathrooms(): ?string
    {
        return $this->bathrooms;
    }

    public function setBathrooms(string $bathrooms): self
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    /**
     * @return Collection|PropertyFeatures[]
     */
    public function getPropertyFeatures(): Collection
    {
        return $this->propertyFeatures;
    }

    public function addPropertyFeature(PropertyFeatures $propertyFeature): self
    {
        if (!$this->propertyFeatures->contains($propertyFeature)) {
            $this->propertyFeatures[] = $propertyFeature;
        }

        return $this;
    }

    public function removePropertyFeature(PropertyFeatures $propertyFeature): self
    {
        if ($this->propertyFeatures->contains($propertyFeature)) {
            $this->propertyFeatures->removeElement($propertyFeature);
        }

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getSeaDistance()
    {
        return $this->seaDistance;
    }

    public function setSeaDistance($seaDistance): self
    {
        $this->seaDistance = $seaDistance;

        return $this;
    }

    public function getSeaDistanceUnit(): ?SeaDistanceUnit
    {
        return $this->seaDistanceUnit;
    }

    public function setSeaDistanceUnit(?SeaDistanceUnit $seaDistanceUnit): self
    {
        $this->seaDistanceUnit = $seaDistanceUnit;

        return $this;
    }

    public function getLivingRooms(): ?int
    {
        return $this->livingRooms;
    }

    public function setLivingRooms(int $livingRooms): self
    {
        $this->livingRooms = $livingRooms;

        return $this;
    }

    public function getMaxNumberOfPeople(): ?int
    {
        return $this->maxNumberOfPeople;
    }

    public function setMaxNumberOfPeople(int $maxNumberOfPeople): self
    {
        $this->maxNumberOfPeople = $maxNumberOfPeople;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMinimumStay(): ?int
    {
        return $this->minimumStay;
    }

    public function setMinimumStay(?int $minimumStay): self
    {
        $this->minimumStay = $minimumStay;

        return $this;
    }

    public function getAdditionalEquipment(): ?string
    {
        return $this->additionalEquipment;
    }

    public function setAdditionalEquipment(?string $additionalEquipment): self
    {
        $this->additionalEquipment = $additionalEquipment;

        return $this;
    }

    public function getAdditionalServices(): ?string
    {
        return $this->additionalServices;
    }

    public function setAdditionalServices(?string $additionalServices): self
    {
        $this->additionalServices = $additionalServices;

        return $this;
    }

    /**
     * @return Collection|PriceInMonth[]
     */
    public function getPriceInMonth(): Collection
    {
        return $this->priceInMonth;
    }

    public function addPriceInMonth(PriceInMonth $priceInMonth): self
    {
        if (!$this->priceInMonth->contains($priceInMonth)) {
            $this->priceInMonth[] = $priceInMonth;
            $priceInMonth->setProperty($this);
        }

        return $this;
    }

    public function removePriceInMonth(PriceInMonth $priceInMonth): self
    {
        if ($this->priceInMonth->contains($priceInMonth)) {
            $this->priceInMonth->removeElement($priceInMonth);
            // set the owning side to null (unless already changed)
            if ($priceInMonth->getProperty() === $this) {
                $priceInMonth->setProperty(null);
            }
        }

        return $this;
    }
}
