<?php

namespace App\Entity;

use App\Repository\ManagementModeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ManagementModeRepository::class)
 */
class ManagementMode
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
    private $managementAgent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="managementMode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManagementAgent(): ?string
    {
        return $this->managementAgent;
    }

    public function setManagementAgent(?string $managementAgent): self
    {
        $this->managementAgent = $managementAgent;

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
