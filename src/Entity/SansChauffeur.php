<?php

namespace App\Entity;

use App\Repository\SansChauffeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SansChauffeurRepository::class)]
class SansChauffeur extends Reservation
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Formule $formule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateRestitution = null;

    public function __construct()
    {
    }

    public function getFormule(): ?Formule
    {
        return $this->formule;
    }

    public function setFormule(?Formule $formule): static
    {
        $this->formule = $formule;

        return $this;
    }

    public function getDateRestitution(): ?\DateTimeInterface
    {
        return $this->dateRestitution;
    }

    public function setDateRestitution(\DateTimeInterface $dateRestitution): static
    {
        $this->dateRestitution = $dateRestitution;

        return $this;
    }
}
