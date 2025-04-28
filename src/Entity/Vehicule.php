<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $immat = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCT = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmat(): ?string
    {
        return $this->immat;
    }

    public function setImmat(string $immat): static
    {
        $this->immat = $immat;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDateCT(): ?\DateTimeInterface
    {
        return $this->dateCT;
    }

    public function setDateCT(\DateTimeInterface $dateCT): static
    {
        $this->dateCT = $dateCT;

        return $this;
    }
}
