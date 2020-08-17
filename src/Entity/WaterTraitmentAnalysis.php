<?php

namespace App\Entity;

use App\Repository\WaterTraitmentAnalysisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WaterTraitmentAnalysisRepository::class)
 */
class WaterTraitmentAnalysis
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
    private $unitTraitmentPresence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $analysisFrequency;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastAnalysisAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $appliedTraitmentType;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="waterTraitmentAnalysis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitTraitmentPresence(): ?string
    {
        return $this->unitTraitmentPresence;
    }

    public function setUnitTraitmentPresence(?string $unitTraitmentPresence): self
    {
        $this->unitTraitmentPresence = $unitTraitmentPresence;

        return $this;
    }

    public function getAnalysisFrequency(): ?string
    {
        return $this->analysisFrequency;
    }

    public function setAnalysisFrequency(?string $analysisFrequency): self
    {
        $this->analysisFrequency = $analysisFrequency;

        return $this;
    }

    // a été modifié: ?\DateTimeInterface en ?string
    public function getLastAnalysisAt(): ?\DateTimeInterface
    {
        return $this->lastAnalysisAt;
    }

    public function setLastAnalysisAt(?\DateTimeInterface $lastAnalysisAt): self
    {
        $this->lastAnalysisAt = $lastAnalysisAt;

        return $this;
    }

    public function getAppliedTraitmentType(): ?string
    {
        return $this->appliedTraitmentType;
    }

    public function setAppliedTraitmentType(?string $appliedTraitmentType): self
    {
        $this->appliedTraitmentType = $appliedTraitmentType;

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
