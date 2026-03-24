<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class UserOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: UserAddress::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserAddress $billingAddress = null;

    #[ORM\Column]
    private ?int $totalAmount = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $invoicePdfUrl = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(targetEntity: OrderSubscription::class, mappedBy: 'userOrder')]
    private Collection $subscriptions;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->subscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getBillingAddress(): ?UserAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?UserAddress $billingAddress): static
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(int $totalAmount): static
    {
        $this->totalAmount = $totalAmount;

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

    public function getInvoicePdfUrl(): ?string
    {
        return $this->invoicePdfUrl;
    }

    public function setInvoicePdfUrl(?string $invoicePdfUrl): static
    {
        $this->invoicePdfUrl = $invoicePdfUrl;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, OrderSubscription>
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }
}
