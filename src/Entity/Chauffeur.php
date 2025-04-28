<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroPermis = null;

    #[ORM\ManyToOne(inversedBy: 'chauffeurs')]
    private ?Trajet $trajet = null;

    /**
     * @var Collection<int, AvecChauffeur>
     */
    #[ORM\OneToMany(targetEntity: AvecChauffeur::class, mappedBy: 'chauffeur')]
    private Collection $avecChauffeurs;

    public function __construct()
    {
        $this->avecChauffeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroPermis(): ?string
    {
        return $this->numeroPermis;
    }

    public function setNumeroPermis(?string $numeroPermis): static
    {
        $this->numeroPermis = $numeroPermis;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): static
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * @return Collection<int, AvecChauffeur>
     */
    public function getAvecChauffeurs(): Collection
    {
        return $this->avecChauffeurs;
    }

    public function addAvecChauffeur(AvecChauffeur $avecChauffeur): static
    {
        if (!$this->avecChauffeurs->contains($avecChauffeur)) {
            $this->avecChauffeurs->add($avecChauffeur);
            $avecChauffeur->setChauffeur($this);
        }

        return $this;
    }

    public function removeAvecChauffeur(AvecChauffeur $avecChauffeur): static
    {
        if ($this->avecChauffeurs->removeElement($avecChauffeur)) {
            // set the owning side to null (unless already changed)
            if ($avecChauffeur->getChauffeur() === $this) {
                $avecChauffeur->setChauffeur(null);
            }
        }

        return $this;
    }
}
