<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class PaymentToken
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 100)]
    private ?string $provider = null;

    #[ORM\Column(length: 255)]
    private ?string $providerToken = null;

    #[ORM\Column(length: 4)]
    private ?string $lastFourDigits = null;

    #[ORM\Column]
    private bool $isDefault = false;

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

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getProviderToken(): ?string
    {
        return $this->providerToken;
    }

    public function setProviderToken(string $providerToken): static
    {
        $this->providerToken = $providerToken;

        return $this;
    }

    public function getLastFourDigits(): ?string
    {
        return $this->lastFourDigits;
    }

    public function setLastFourDigits(string $lastFourDigits): static
    {
        $this->lastFourDigits = $lastFourDigits;

        return $this;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;

        return $this;
    }
}
