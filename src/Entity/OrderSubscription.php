<?php

namespace App\Entity;

use App\Enum\SubscriptionDuration;
use App\Enum\SubscriptionStatus;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class OrderSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UserOrder::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserOrder $userOrder = null;

    #[ORM\ManyToOne(targetEntity: SaasProduct::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?SaasProduct $saasProduct = null;

    #[ORM\Column(length: 50, enumType: SubscriptionDuration::class)]
    private ?SubscriptionDuration $duration = null;

    #[ORM\Column]
    private ?int $quantity = 1;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $unitPrice = null;

    #[ORM\Column(length: 50, enumType: SubscriptionStatus::class)]
    private ?SubscriptionStatus $status = null;

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

    public function getDuration(): ?SubscriptionDuration
    {
        return $this->duration;
    }

    public function setDuration(SubscriptionDuration $duration): static
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

    public function getUnitPrice(): ?string
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(string $unitPrice): static
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getStatus(): ?SubscriptionStatus
    {
        return $this->status;
    }

    public function setStatus(SubscriptionStatus $status): static
    {
        $this->status = $status;

        return $this;
    }
}
