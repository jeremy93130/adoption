<?php

namespace App\Entity;

use App\Repository\DemandesAdoptionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandesAdoptionsRepository::class)]
class DemandesAdoptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_demande = null;

    #[ORM\ManyToOne(inversedBy: 'demandesAdoptions')]
    private ?User $adoptant_id = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('En attente', 'Acceptée', 'Refusée')")]
    private $statut;

    #[ORM\ManyToOne(targetEntity: Animaux::class, inversedBy: 'demandesAdoptions')]
    #[ORM\JoinColumn(name: 'animal_id_id', referencedColumnName: 'id', nullable: true)]
    private ?Animaux $animal_id = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Celibataire', 'En couple')", nullable: false)]
    private $situation_familiale;

    #[ORM\Column(nullable: false)]
    private int $nombre_enfants;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Maison', 'Appartement')", nullable: false)]
    private string $type_habitat;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Oui','Non')" , nullable: false)]
    private $exterieur_interieur;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Terasse', 'Balcon','Jardin')")]
    private $type_exterieur = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Oui', 'Non')", nullable: false)]
    private string $autre_animal;

    #[ORM\Column (nullable: false)]
    private int $etage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->date_demande;
    }

    public function setDateDemande(\DateTimeInterface $date_demande): static
    {
        $this->date_demande = $date_demande;

        return $this;
    }

    public function getAdoptantId(): ?User
    {
        return $this->adoptant_id;
    }

    public function setAdoptantId(?User $adoptant_id): static
    {
        $this->adoptant_id = $adoptant_id;

        return $this;
    }


    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut)
    {
        $this->statut = $statut;

        return $this;
    }

    public function getAnimalId(): ?Animaux
    {
        return $this->animal_id;
    }

    public function setAnimalId(?Animaux $animal_id): static
    {
        $this->animal_id = $animal_id;

        return $this;
    }

    public function getSituationFamiliale(): string
    {
        return $this->situation_familiale;
    }

    public function setSituationFamiliale(string $situation_familiale): static
    {
        $this->situation_familiale = $situation_familiale;

        return $this;
    }

    public function getNombreEnfants(): int
    {
        return $this->nombre_enfants;
    }

    public function setNombreEnfants(int $nombre_enfants): static
    {
        $this->nombre_enfants = $nombre_enfants;

        return $this;
    }

    public function getTypeHabitat(): string
    {
        return $this->type_habitat;
    }

    public function setTypeHabitat(string $type_habitat): static
    {
        $this->type_habitat = $type_habitat;

        return $this;
    }

    public function getExterieurInterieur(): string
    {
        return $this->exterieur_interieur;
    }

    public function setExterieurInterieur(string $exterieur_interieur): static
    {
        $this->exterieur_interieur = $exterieur_interieur;

        return $this;
    }

    public function getTypeExterieur(): ?string
    {
        return $this->type_exterieur;
    }

    public function setTypeExterieur(string $type_exterieur): static
    {
        $this->type_exterieur = $type_exterieur;

        return $this;
    }

    public function getAutreAnimal(): string
    {
        return $this->autre_animal;
    }

    public function setAutreAnimal(string $autre_animal): static
{
    $this->autre_animal = $autre_animal;

    return $this;
}

    public function getEtage(): int
    {
        return $this->etage;
    }

    public function setEtage(int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }
}
