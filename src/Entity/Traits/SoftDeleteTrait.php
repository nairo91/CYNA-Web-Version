<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait SoftDeleteTrait
{
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deletedAt = null;

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}
