<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateLog = null;

    #[ORM\Column(length: 255)]
    private ?string $action = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    private ?Salarie $user = null;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLog(): ?\DateTimeInterface
    {
        return $this->dateLog;
    }

    public function setDateLog(\DateTimeInterface $dateLog): static
    {
        $this->dateLog = $dateLog;

        return $this;
    }
    
    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getUser(): ?Salarie
    {
        return $this->user;
    }

    public function setUser(?Salarie $user): static
    {
        $this->user = $user;

        return $this;
    }
}
