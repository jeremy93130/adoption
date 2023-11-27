<?php

namespace App\Entity;

use App\Repository\AnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;

#[ORM\Entity(repositoryClass: AnimauxRepository::class)]
class Animaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column]
    private ?int $taille = null;

    #[ORM\Column]
    private ?float $poids = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Male', 'Femelle')")]
    private $sexe;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('chat', 'chien', 'oiseau','rongeur','reptile')")]
    private $espece;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('disponible', 'en attente', 'adopté')")]
    private $statut;

    #[ORM\Column]
    private ?string $race;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'animaux')]
    private Collection $adoptant_id;

    #[ORM\OneToMany(mappedBy: 'animal_id', targetEntity: DemandesAdoptions::class)]
    private Collection $demandesAdoptions;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('carnivore', 'herbivore', 'omnivore', 'ovipare')")]
    private $regime_alimentaire;

    public function __construct()
    {
        $this->adoptant_id = new ArrayCollection();
        $this->demandesAdoptions = new ArrayCollection();
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAdoptantId(): Collection
    {
        return $this->adoptant_id;
    }

    public function addAdoptantId(User $adoptantId): static
    {
        if (!$this->adoptant_id->contains($adoptantId)) {
            $this->adoptant_id->add($adoptantId);
        }

        return $this;
    }

    public function removeAdoptantId(User $adoptantId): static
    {
        $this->adoptant_id->removeElement($adoptantId);

        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getEspece(): string
    {
        return $this->espece;
    }

    /**
     * @param string $espece
     */
    public function setEspece(string $espece): void
    {
        $this->espece = $espece;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace($race): static
    {
        $this->race = $race;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection<int, DemandesAdoptions>
     */
    public function getDemandesAdoptions(): Collection
    {
        return $this->demandesAdoptions;
    }

    public function addDemandesAdoption(DemandesAdoptions $demandesAdoption): static
    {
        if (!$this->demandesAdoptions->contains($demandesAdoption)) {
            $this->demandesAdoptions->add($demandesAdoption);
            $demandesAdoption->setAnimalId($this);
        }

        return $this;
    }

    public function removeDemandesAdoption(DemandesAdoptions $demandesAdoption): static
    {
        if ($this->demandesAdoptions->removeElement($demandesAdoption)) {
            // set the owning side to null (unless already changed)
            if ($demandesAdoption->getAnimalId() === $this) {
                $demandesAdoption->setAnimalId(null);
            }
        }

        return $this;
    }

    public function getRegimeAlimentaire()
    {
        return $this->regime_alimentaire;
    }

    public function setRegimeAlimentaire($regime_alimentaire)
    {
        $this->regime_alimentaire = $regime_alimentaire;

        return $this;
    }
}
