<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmenityTranslationRepository")
 */
class AmenityTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return AmenityTranslation
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
