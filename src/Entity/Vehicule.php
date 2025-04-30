<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'vehicule')]
    private Collection $reservations;

    /**
     * @var Collection<int, PartiesVehicules>
     */
    #[ORM\ManyToMany(targetEntity: PartiesVehicules::class, inversedBy: 'vehicules')]
    private Collection $parties;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?TypeVehicule $type = null;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->parties = new ArrayCollection();
        $this->typeVehicule = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setVehicule($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getVehicule() === $this) {
                $reservation->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PartiesVehicules>
     */
    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function addParty(PartiesVehicules $party): static
    {
        if (!$this->parties->contains($party)) {
            $this->parties->add($party);
        }

        return $this;
    }

    public function removeParty(PartiesVehicules $party): static
    {
        $this->parties->removeElement($party);

        return $this;
    }

    public function getType(): ?TypeVehicule
    {
        return $this->type;
    }

    public function setType(?TypeVehicule $type): static
    {
        $this->type = $type;

        return $this;
    }
}
