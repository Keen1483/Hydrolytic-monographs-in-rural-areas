<?php

namespace App\Entity;

use App\Repository\StorageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StorageRepository::class)
 */
class Storage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sufficient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $structureStatus;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="storage")
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSufficient(): ?string
    {
        return $this->sufficient;
    }

    public function setSufficient(string $sufficient): self
    {
        $this->sufficient = $sufficient;

        return $this;
    }

    public function getStructureStatus(): ?string
    {
        return $this->structureStatus;
    }

    public function setStructureStatus(?string $structureStatus): self
    {
        $this->structureStatus = $structureStatus;

        return $this;
    }

    public function getAep(): ?Aep
    {
        return $this->aep;
    }

    public function setAep(?Aep $aep): self
    {
        $this->aep = $aep;

        return $this;
    }
}
