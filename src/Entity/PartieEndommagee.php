<?php

namespace App\Entity;

use App\Repository\PartieEndommageeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieEndommageeRepository::class)]
class PartieEndommagee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PartiesVehicules $partie = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartie(): ?PartiesVehicules
    {
        return $this->partie;
    }

    public function setPartie(?PartiesVehicules $partie): static
    {
        $this->partie = $partie;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }
}
