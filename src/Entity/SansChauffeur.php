<?php

namespace App\Entity;

use App\Repository\SansChauffeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SansChauffeurRepository::class)]
class SansChauffeur extends Reservation
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formule $formule = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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
}
