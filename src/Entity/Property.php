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
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @return mixed
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void {
        $this->link = $link;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Propertytype", inversedBy="properties")
     * @ORM\JoinColumn(nullable=true)
     */
    private $propertytype;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="properties")
     * @ORM\JoinColumn(nullable=true)
     */
    private $district;

    /**
     * @ORM\Column(type="integer")
     */
    private $bedrooms;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, nullable=true)
     */
    private $bathrooms;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Amenity", inversedBy="properties")
     */
    private $amenities;

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
     * @ORM\JoinColumn(nullable=true)
     */
    private $seaDistanceUnit;

    /**
     * @ORM\Column(type="integer")
     */
    private $livingRooms;

    /**
     * @ORM\Column(type="integer", nullable=true)
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalFees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PriceInMonth", mappedBy="property", orphanRemoval=true)
     */
    private $priceInMonth;

    public function __construct()
    {
        $this->amenities = new ArrayCollection();
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

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPropertytype(): ?Propertytype
    {
        return $this->propertytype;
    }

    public function setPropertytype(?Propertytype $propertytype): self
    {
        $this->propertytype = $propertytype;

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

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): self
    {
        $this->district = $district;

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
     * @return Collection|Amenity[]
     */
    public function getAmenities(): Collection
    {
        return $this->amenities;
    }

    public function addAmenity(Amenity $amenity): self
    {
        if (!$this->amenities->contains($amenity)) {
            $this->amenities[] = $amenity;
        }

        return $this;
    }

    public function removeAmenity(Amenity $amenity): self
    {
        if ($this->amenities->contains($amenity)) {
            $this->amenities->removeElement($amenity);
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

    public function getAdditionalFees(): ?string
    {
        return $this->additionalServices;
    }

    public function setAdditionalFees(?string $additionalServices): self
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

    public function __toString() {
        return $this->name;
    }
}
