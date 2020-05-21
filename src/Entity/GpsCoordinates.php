<?php

namespace App\Entity;

use App\Repository\GpsCoordinatesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GpsCoordinatesRepository::class)
 */
class GpsCoordinates
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
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\ManyToOne(targetEntity=LocalInformations::class, inversedBy="gpsCoordinates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $localInformations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLocalInformations(): ?LocalInformations
    {
        return $this->localInformations;
    }

    public function setLocalInformations(?LocalInformations $localInformations): self
    {
        $this->localInformations = $localInformations;

        return $this;
    }
}
