<?php

namespace App\Entity;

use App\Repository\LocalInformationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalInformationsRepository::class)
 */
class LocalInformations
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
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $borough;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $district;

    /**
     * @ORM\OneToMany(targetEntity=GpsCoordinates::class, mappedBy="localInformations", orphanRemoval=true)
     */
    private $gpsCoordinates;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $population;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="localInformations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function __construct()
    {
        $this->gpsCoordinates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getBorough(): ?string
    {
        return $this->borough;
    }

    public function setBorough(string $borough): self
    {
        $this->borough = $borough;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return Collection|GpsCoordinates[]
     */
    public function getGpsCoordinates(): Collection
    {
        return $this->gpsCoordinates;
    }

    public function addGpsCoordinate(GpsCoordinates $gpsCoordinate): self
    {
        if (!$this->gpsCoordinates->contains($gpsCoordinate)) {
            $this->gpsCoordinates[] = $gpsCoordinate;
            $gpsCoordinate->setLocalInformations($this);
        }

        return $this;
    }

    public function removeGpsCoordinate(GpsCoordinates $gpsCoordinate): self
    {
        if ($this->gpsCoordinates->contains($gpsCoordinate)) {
            $this->gpsCoordinates->removeElement($gpsCoordinate);
            // set the owning side to null (unless already changed)
            if ($gpsCoordinate->getLocalInformations() === $this) {
                $gpsCoordinate->setLocalInformations(null);
            }
        }

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

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
        return 'LocalInformations';
    }
}
