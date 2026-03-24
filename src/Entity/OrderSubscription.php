<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class OrderSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UserOrder::class, inversedBy: 'subscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserOrder $userOrder = null;

    #[ORM\ManyToOne(targetEntity: SaasProduct::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?SaasProduct $saasProduct = null;

    #[ORM\Column(length: 50)]
    private ?string $duration = null;

    #[ORM\Column]
    private ?int $quantity = 1;

    #[ORM\Column]
    private ?int $unitPrice = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserOrder(): ?UserOrder
    {
        return $this->userOrder;
    }

    public function setUserOrder(?UserOrder $userOrder): static
    {
        $this->userOrder = $userOrder;

        return $this;
    }

    public function getSaasProduct(): ?SaasProduct
    {
        return $this->saasProduct;
    }

    public function setSaasProduct(?SaasProduct $saasProduct): static
    {
        $this->saasProduct = $saasProduct;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(int $unitPrice): static
    {
        $this->unitPrice = $unitPrice;

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
}
