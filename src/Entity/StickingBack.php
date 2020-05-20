<?php

namespace App\Entity;

use App\Repository\StickingBackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StickingBackRepository::class)
 */
class StickingBack
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="stickingBack")
     */
    private $aep;

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

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

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
