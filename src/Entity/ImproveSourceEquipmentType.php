<?php

namespace App\Entity;

use App\Repository\ImproveSourceEquipmentTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImproveSourceEquipmentTypeRepository::class)
 */
class ImproveSourceEquipmentType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $superstructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pipeline;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="aepImproveSource")
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    // a été modifié: ?string en ?bool
    public function getSuperstructure(): ?bool
    {
        return $this->superstructure;
    }

    public function setSuperstructure(?string $superstructure): self
    {
        $this->superstructure = $superstructure;

        return $this;
    }

    // a été modifié: ?string en ?bool
    public function getPipeline(): ?bool
    {
        return $this->pipeline;
    }

    public function setPipeline(string $pipeline): self
    {
        $this->pipeline = $pipeline;

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
