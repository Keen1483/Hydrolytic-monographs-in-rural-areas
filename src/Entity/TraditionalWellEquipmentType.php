<?php

namespace App\Entity;

use App\Repository\TraditionalWellEquipmentTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraditionalWellEquipmentTypeRepository::class)
 */
class TraditionalWellEquipmentType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bucket;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $rope;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lid;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pulley;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $superstructure;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="aepTraditionalWell")
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBucket(): ?bool
    {
        return $this->bucket;
    }

    public function setBucket(?bool $bucket): self
    {
        $this->bucket = $bucket;

        return $this;
    }

    public function getRope(): ?bool
    {
        return $this->rope;
    }

    public function setRope(?bool $rope): self
    {
        $this->rope = $rope;

        return $this;
    }

    public function getLid(): ?bool
    {
        return $this->lid;
    }

    public function setLid(?bool $lid): self
    {
        $this->lid = $lid;

        return $this;
    }

    public function getPulley(): ?bool
    {
        return $this->pulley;
    }

    public function setPulley(?bool $pulley): self
    {
        $this->pulley = $pulley;

        return $this;
    }

    public function getSuperstructure(): ?bool
    {
        return $this->superstructure;
    }

    public function setSuperstructure(?bool $superstructure): self
    {
        $this->superstructure = $superstructure;

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
