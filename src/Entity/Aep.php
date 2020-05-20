<?php

namespace App\Entity;

use App\Repository\AepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AepRepository::class)
 */
class Aep
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $depth;

    /**
     * @ORM\Column(type="datetime")
     */
    private $buildingYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $funding;

    /**
     * @ORM\OneToMany(targetEntity=StickingBack::class, mappedBy="aep")
     */
    private $stickingBack;

    /**
     * @ORM\Column(type="float")
     */
    private $productionCapacity;

    /**
     * @ORM\OneToMany(targetEntity=Storage::class, mappedBy="aep")
     */
    private $storage;

    /**
     * @ORM\OneToMany(targetEntity=AgentCommunicationMode::class, mappedBy="aep")
     */
    private $agentCommunicationMode;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $networkLength;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adductionType;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $linearNetwork;

    /**
     * @ORM\OneToMany(targetEntity=EquipmentAep::class, mappedBy="aep", orphanRemoval=true)
     */
    private $equipmentAep;

    /**
     * @ORM\OneToMany(targetEntity=WaterTraitmentAnalysis::class, mappedBy="aep", orphanRemoval=true)
     */
    private $waterTraitmentAnalysis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operatingState;

    /**
     * @ORM\OneToMany(targetEntity=ManagementMode::class, mappedBy="aep", orphanRemoval=true)
     */
    private $managementMode;

    /**
     * @ORM\OneToMany(targetEntity=FundingMode::class, mappedBy="aep", orphanRemoval=true)
     */
    private $fundingMode;

    /**
     * @ORM\OneToMany(targetEntity=Maintenance::class, mappedBy="aep", orphanRemoval=true)
     */
    private $maintenance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->stickingBack = new ArrayCollection();
        $this->storage = new ArrayCollection();
        $this->agentCommunicationMode = new ArrayCollection();
        $this->equipmentAep = new ArrayCollection();
        $this->waterTraitmentAnalysis = new ArrayCollection();
        $this->managementMode = new ArrayCollection();
        $this->fundingMode = new ArrayCollection();
        $this->maintenance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }

    public function setDepth(float $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getBuildingYear(): ?\DateTimeInterface
    {
        return $this->buildingYear;
    }

    public function setBuildingYear(\DateTimeInterface $buildingYear): self
    {
        $this->buildingYear = $buildingYear;

        return $this;
    }

    public function getFunding(): ?string
    {
        return $this->funding;
    }

    public function setFunding(string $funding): self
    {
        $this->funding = $funding;

        return $this;
    }

    /**
     * @return Collection|StickingBack[]
     */
    public function getStickingBack(): Collection
    {
        return $this->stickingBack;
    }

    public function addStickingBack(StickingBack $stickingBack): self
    {
        if (!$this->stickingBack->contains($stickingBack)) {
            $this->stickingBack[] = $stickingBack;
            $stickingBack->setAep($this);
        }

        return $this;
    }

    public function removeStickingBack(StickingBack $stickingBack): self
    {
        if ($this->stickingBack->contains($stickingBack)) {
            $this->stickingBack->removeElement($stickingBack);
            // set the owning side to null (unless already changed)
            if ($stickingBack->getAep() === $this) {
                $stickingBack->setAep(null);
            }
        }

        return $this;
    }

    public function getProductionCapacity(): ?float
    {
        return $this->productionCapacity;
    }

    public function setProductionCapacity(float $productionCapacity): self
    {
        $this->productionCapacity = $productionCapacity;

        return $this;
    }

    /**
     * @return Collection|Storage[]
     */
    public function getStorage(): Collection
    {
        return $this->storage;
    }

    public function addStorage(Storage $storage): self
    {
        if (!$this->storage->contains($storage)) {
            $this->storage[] = $storage;
            $storage->setAep($this);
        }

        return $this;
    }

    public function removeStorage(Storage $storage): self
    {
        if ($this->storage->contains($storage)) {
            $this->storage->removeElement($storage);
            // set the owning side to null (unless already changed)
            if ($storage->getAep() === $this) {
                $storage->setAep(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AgentCommunicationMode[]
     */
    public function getAgentCommunicationMode(): Collection
    {
        return $this->agentCommunicationMode;
    }

    public function addAgentCommunicationMode(AgentCommunicationMode $agentCommunicationMode): self
    {
        if (!$this->agentCommunicationMode->contains($agentCommunicationMode)) {
            $this->agentCommunicationMode[] = $agentCommunicationMode;
            $agentCommunicationMode->setAep($this);
        }

        return $this;
    }

    public function removeAgentCommunicationMode(AgentCommunicationMode $agentCommunicationMode): self
    {
        if ($this->agentCommunicationMode->contains($agentCommunicationMode)) {
            $this->agentCommunicationMode->removeElement($agentCommunicationMode);
            // set the owning side to null (unless already changed)
            if ($agentCommunicationMode->getAep() === $this) {
                $agentCommunicationMode->setAep(null);
            }
        }

        return $this;
    }

    public function getNetworkLength(): ?float
    {
        return $this->networkLength;
    }

    public function setNetworkLength(?float $networkLength): self
    {
        $this->networkLength = $networkLength;

        return $this;
    }

    public function getAdductionType(): ?string
    {
        return $this->adductionType;
    }

    public function setAdductionType(string $adductionType): self
    {
        $this->adductionType = $adductionType;

        return $this;
    }

    public function getLinearNetwork(): ?string
    {
        return $this->linearNetwork;
    }

    public function setLinearNetwork(?string $linearNetwork): self
    {
        $this->linearNetwork = $linearNetwork;

        return $this;
    }

    /**
     * @return Collection|EquipmentAep[]
     */
    public function getEquipmentAep(): Collection
    {
        return $this->equipmentAep;
    }

    public function addEquipmentAep(EquipmentAep $equipmentAep): self
    {
        if (!$this->equipmentAep->contains($equipmentAep)) {
            $this->equipmentAep[] = $equipmentAep;
            $equipmentAep->setAep($this);
        }

        return $this;
    }

    public function removeEquipmentAep(EquipmentAep $equipmentAep): self
    {
        if ($this->equipmentAep->contains($equipmentAep)) {
            $this->equipmentAep->removeElement($equipmentAep);
            // set the owning side to null (unless already changed)
            if ($equipmentAep->getAep() === $this) {
                $equipmentAep->setAep(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WaterTraitmentAnalysis[]
     */
    public function getWaterTraitmentAnalysis(): Collection
    {
        return $this->waterTraitmentAnalysis;
    }

    public function addWaterTraitmentAnalysi(WaterTraitmentAnalysis $waterTraitmentAnalysi): self
    {
        if (!$this->waterTraitmentAnalysis->contains($waterTraitmentAnalysi)) {
            $this->waterTraitmentAnalysis[] = $waterTraitmentAnalysi;
            $waterTraitmentAnalysi->setAep($this);
        }

        return $this;
    }

    public function removeWaterTraitmentAnalysi(WaterTraitmentAnalysis $waterTraitmentAnalysi): self
    {
        if ($this->waterTraitmentAnalysis->contains($waterTraitmentAnalysi)) {
            $this->waterTraitmentAnalysis->removeElement($waterTraitmentAnalysi);
            // set the owning side to null (unless already changed)
            if ($waterTraitmentAnalysi->getAep() === $this) {
                $waterTraitmentAnalysi->setAep(null);
            }
        }

        return $this;
    }

    public function getOperatingState(): ?string
    {
        return $this->operatingState;
    }

    public function setOperatingState(string $operatingState): self
    {
        $this->operatingState = $operatingState;

        return $this;
    }

    /**
     * @return Collection|ManagementMode[]
     */
    public function getManagementMode(): Collection
    {
        return $this->managementMode;
    }

    public function addManagementMode(ManagementMode $managementMode): self
    {
        if (!$this->managementMode->contains($managementMode)) {
            $this->managementMode[] = $managementMode;
            $managementMode->setAep($this);
        }

        return $this;
    }

    public function removeManagementMode(ManagementMode $managementMode): self
    {
        if ($this->managementMode->contains($managementMode)) {
            $this->managementMode->removeElement($managementMode);
            // set the owning side to null (unless already changed)
            if ($managementMode->getAep() === $this) {
                $managementMode->setAep(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FundingMode[]
     */
    public function getFundingMode(): Collection
    {
        return $this->fundingMode;
    }

    public function addFundingMode(FundingMode $fundingMode): self
    {
        if (!$this->fundingMode->contains($fundingMode)) {
            $this->fundingMode[] = $fundingMode;
            $fundingMode->setAep($this);
        }

        return $this;
    }

    public function removeFundingMode(FundingMode $fundingMode): self
    {
        if ($this->fundingMode->contains($fundingMode)) {
            $this->fundingMode->removeElement($fundingMode);
            // set the owning side to null (unless already changed)
            if ($fundingMode->getAep() === $this) {
                $fundingMode->setAep(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Maintenance[]
     */
    public function getMaintenance(): Collection
    {
        return $this->maintenance;
    }

    public function addMaintenance(Maintenance $maintenance): self
    {
        if (!$this->maintenance->contains($maintenance)) {
            $this->maintenance[] = $maintenance;
            $maintenance->setAep($this);
        }

        return $this;
    }

    public function removeMaintenance(Maintenance $maintenance): self
    {
        if ($this->maintenance->contains($maintenance)) {
            $this->maintenance->removeElement($maintenance);
            // set the owning side to null (unless already changed)
            if ($maintenance->getAep() === $this) {
                $maintenance->setAep(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
