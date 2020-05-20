<?php

namespace App\Entity;

use App\Repository\LostWellRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LostWellRepository::class)
 */
class LostWell
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
    private $exist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $functional;

    /**
     * @ORM\ManyToOne(targetEntity=DrillingPmh::class, inversedBy="lostWell")
     * @ORM\JoinColumn(nullable=false)
     */
    private $drillingPmh;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExist(): ?string
    {
        return $this->exist;
    }

    public function setExist(?string $exist): self
    {
        $this->exist = $exist;

        return $this;
    }

    public function getFunctional(): ?string
    {
        return $this->functional;
    }

    public function setFunctional(?string $functional): self
    {
        $this->functional = $functional;

        return $this;
    }

    public function getDrillingPmh(): ?DrillingPmh
    {
        return $this->drillingPmh;
    }

    public function setDrillingPmh(?DrillingPmh $drillingPmh): self
    {
        $this->drillingPmh = $drillingPmh;

        return $this;
    }
}
