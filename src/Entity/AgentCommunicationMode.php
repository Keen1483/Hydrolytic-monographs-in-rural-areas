<?php

namespace App\Entity;

use App\Repository\AgentCommunicationModeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentCommunicationModeRepository::class)
 */
class AgentCommunicationMode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contract;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $capacityBuilding;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

    /**
     * @ORM\ManyToOne(targetEntity=Aep::class, inversedBy="agentCommunicationMode")
     */
    private $aep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContract(): ?bool
    {
        return $this->contract;
    }

    public function setContract(?bool $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    public function getCapacityBuilding(): ?bool
    {
        return $this->capacityBuilding;
    }

    public function setCapacityBuilding(?bool $capacityBuilding): self
    {
        $this->capacityBuilding = $capacityBuilding;

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
