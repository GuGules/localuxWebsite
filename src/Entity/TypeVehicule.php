<?php

namespace App\Entity;

use App\Repository\TypeVehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeVehiculeRepository::class)]
class TypeVehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lib = null;

    /**
     * @var Collection<int, PartiesVehicules>
     */
    #[ORM\ManyToMany(targetEntity: PartiesVehicules::class, mappedBy: 'typesVehicules')]
    private Collection $partiesVehicules;

    /**
     * @var Collection<int, Vehicule>
     */
    #[ORM\OneToMany(targetEntity: Vehicule::class, mappedBy: 'type')]
    private Collection $vehicules;
    public function __construct()
    {
        $this->partiesVehicules = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
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
     * @return Collection<int, PartiesVehicules>
     */
    public function getPartiesVehicules(): Collection
    {
        return $this->partiesVehicules;
    }

    public function addPartiesVehicule(PartiesVehicules $partiesVehicule): static
    {
        if (!$this->partiesVehicules->contains($partiesVehicule)) {
            $this->partiesVehicules->add($partiesVehicule);
            $partiesVehicule->addTypesVehicule($this);
        }

        return $this;
    }

    public function removePartiesVehicule(PartiesVehicules $partiesVehicule): static
    {
        if ($this->partiesVehicules->removeElement($partiesVehicule)) {
            $partiesVehicule->removeTypesVehicule($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->setType($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getType() === $this) {
                $vehicule->setType(null);
            }
        }

        return $this;
    }
}
