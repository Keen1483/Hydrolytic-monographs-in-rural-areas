<?php

namespace App\Entity;

use App\Repository\EquipmentAepRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentAepRepository::class)
 */
class EquipmentAep
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
    private $pumpQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="equipmentAep")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPumpQuality(): ?string
    {
        return $this->pumpQuality;
    }

    public function setPumpQuality(?string $pumpQuality): self
    {
        $this->pumpQuality = $pumpQuality;

        return $this;
    }

    public function getOthers(): ?string
    {
        return $this->others;
    }

    public function setOthers(?string $others): self
    {
        $this->others = $others;

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
