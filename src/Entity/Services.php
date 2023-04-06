<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $PlanType = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column(length: 255)]
    private ?string $PrincipalFeatures = null;

    #[ORM\Column(length: 255)]
    private ?string $OtherFeatures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanType(): ?string
    {
        return $this->PlanType;
    }

    public function setPlanType(string $PlanType): self
    {
        $this->PlanType = $PlanType;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getPrincipalFeatures(): ?string
    {
        return $this->PrincipalFeatures;
    }

    public function setPrincipalFeatures(string $PrincipalFeatures): self
    {
        $this->PrincipalFeatures = $PrincipalFeatures;

        return $this;
    }

    public function getOtherFeatures(): ?string
    {
        return $this->OtherFeatures;
    }

    public function setOtherFeatures(string $OtherFeatures): self
    {
        $this->OtherFeatures = $OtherFeatures;

        return $this;
    }
}
