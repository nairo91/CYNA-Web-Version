<?php

namespace App\Entity;

use App\Entity\Traits\SoftDeleteTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class SaasProduct
{
    use SoftDeleteTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'saasProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'json')]
    private array $technicalCharacteristics = [];

    #[ORM\Column]
    private ?int $basePrice = null;

    #[ORM\Column(length: 50)]
    private ?string $pricingModel = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $priority = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTechnicalCharacteristics(): array
    {
        return $this->technicalCharacteristics;
    }

    public function setTechnicalCharacteristics(array $technicalCharacteristics): static
    {
        $this->technicalCharacteristics = $technicalCharacteristics;

        return $this;
    }

    public function getBasePrice(): ?int
    {
        return $this->basePrice;
    }

    public function setBasePrice(int $basePrice): static
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    public function getPricingModel(): ?string
    {
        return $this->pricingModel;
    }

    public function setPricingModel(string $pricingModel): static
    {
        $this->pricingModel = $pricingModel;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }
}
