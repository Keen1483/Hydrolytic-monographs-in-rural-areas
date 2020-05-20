<?php

namespace App\Entity;

use App\Repository\FundingModeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FundingModeRepository::class)
 */
class FundingMode
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
    private $facturationMode;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="fundingMode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacturationMode(): ?string
    {
        return $this->facturationMode;
    }

    public function setFacturationMode(?string $facturationMode): self
    {
        $this->facturationMode = $facturationMode;

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
