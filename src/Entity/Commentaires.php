<?php

namespace App\Entity;

use App\Repository\CommentairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentairesRepository::class)]
class Commentaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $adoptant_id = null;

    #[ORM\ManyToMany(targetEntity: Animaux::class, inversedBy: 'commentaires')]
    private Collection $animal_id;

    public function __construct()
    {
        $this->animal_id = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $date_commentaire): static
    {
        $this->date_commentaire = $date_commentaire;

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

    /**
     * @return Collection<int, Animaux>
     */
    public function getAnimalId(): Collection
    {
        return $this->animal_id;
    }

    public function addAnimalId(Animaux $animalId): static
    {
        if (!$this->animal_id->contains($animalId)) {
            $this->animal_id->add($animalId);
        }

        return $this;
    }

    public function removeAnimalId(Animaux $animalId): static
    {
        $this->animal_id->removeElement($animalId);

        return $this;
    }
}
