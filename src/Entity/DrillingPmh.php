<?php

namespace App\Entity;

use App\Repository\DrillingPmhRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrillingPmhRepository::class)
 */
class DrillingPmh
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
    private $pompBrand;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pumpPower;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $superstructure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $drainingChannel;

    /**
     * @ORM\OneToMany(targetEntity=LostWell::class, mappedBy="drillingPmh")
     */
    private $lostWell;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="aepPmh")
     */
    private $aep;

    public function __construct()
    {
        $this->lostWell = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPompBrand(): ?string
    {
        return $this->pompBrand;
    }

    public function setPompBrand(?string $pompBrand): self
    {
        $this->pompBrand = $pompBrand;

        return $this;
    }

    public function getPumpPower(): ?float
    {
        return $this->pumpPower;
    }

    public function setPumpPower(?float $pumpPower): self
    {
        $this->pumpPower = $pumpPower;

        return $this;
    }

    public function getSuperstructure(): ?string
    {
        return $this->superstructure;
    }

    public function setSuperstructure(?string $superstructure): self
    {
        $this->superstructure = $superstructure;

        return $this;
    }

    public function getDrainingChannel(): ?string
    {
        return $this->drainingChannel;
    }

    public function setDrainingChannel(?string $drainingChannel): self
    {
        $this->drainingChannel = $drainingChannel;

        return $this;
    }

    /**
     * @return Collection|LostWell[]
     */
    public function getLostWell(): Collection
    {
        return $this->lostWell;
    }

    public function addLostWell(LostWell $lostWell): self
    {
        if (!$this->lostWell->contains($lostWell)) {
            $this->lostWell[] = $lostWell;
            $lostWell->setDrillingPmh($this);
        }

        return $this;
    }

    public function removeLostWell(LostWell $lostWell): self
    {
        if ($this->lostWell->contains($lostWell)) {
            $this->lostWell->removeElement($lostWell);
            // set the owning side to null (unless already changed)
            if ($lostWell->getDrillingPmh() === $this) {
                $lostWell->setDrillingPmh(null);
            }
        }

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

    public function __toString()
    {
        return 'drillingPmh';
    }
}
