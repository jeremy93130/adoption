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
}
