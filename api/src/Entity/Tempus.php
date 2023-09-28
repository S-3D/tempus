<?php

namespace App\Entity;

use App\Repository\TempusRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ApiResource()]
#[ORM\Entity(repositoryClass: TempusRepository::class)]
class Tempus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $userID = null;

    #[ORM\ManyToOne]
    private ?Date $DateID = null;

    #[ORM\Column(nullable: true)]
    private ?array $taches = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?User
    {
        return $this->userID;
    }

    public function setUserID(?User $userID): static
    {
        $this->userID = $userID;

        return $this;
    }

    public function getDateID(): ?Date
    {
        return $this->DateID;
    }

    public function setDateID(?Date $DateID): static
    {
        $this->DateID = $DateID;

        return $this;
    }

    public function getTaches(): ?array
    {
        return $this->taches;
    }

    public function setTaches(?array $taches): static
    {
        $this->taches = $taches;

        return $this;
    }
}
