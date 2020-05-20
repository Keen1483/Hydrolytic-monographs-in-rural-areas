<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintenanceRepository::class)
 */
class Maintenance
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
    private $agent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="maintenance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgent(): ?string
    {
        return $this->agent;
    }

    public function setAgent(?string $agent): self
    {
        $this->agent = $agent;

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
