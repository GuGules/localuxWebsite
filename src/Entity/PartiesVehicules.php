<?php

namespace App\Entity;

use App\Repository\PartiesVehiculesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartiesVehiculesRepository::class)]
class PartiesVehicules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lib = null;

    /**
     * @var Collection<int, TypeVehicule>
     */
    #[ORM\ManyToMany(targetEntity: TypeVehicule::class, inversedBy: 'partiesVehicules')]
    private Collection $typesVehicules;

    public function __construct()
    {
        $this->typesVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLib(): ?string
    {
        return $this->lib;
    }

    public function setLib(string $lib): static
    {
        $this->lib = $lib;

        return $this;
    }

    /**
     * @return Collection<int, TypeVehicule>
     */
    public function getTypesVehicules(): Collection
    {
        return $this->typesVehicules;
    }

    public function addTypesVehicule(TypeVehicule $typesVehicule): static
    {
        if (!$this->typesVehicules->contains($typesVehicule)) {
            $this->typesVehicules->add($typesVehicule);
        }

        return $this;
    }

    public function removeTypesVehicule(TypeVehicule $typesVehicule): static
    {
        $this->typesVehicules->removeElement($typesVehicule);

        return $this;
    }
}
