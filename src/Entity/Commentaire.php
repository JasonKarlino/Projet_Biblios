<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use App\Enum\CommentaireStatus;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAuteur = null;

    #[ORM\Column(length: 255)]
    private ?string $mailAuteur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_creation = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_publication = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\Column(enumType: CommentaireStatus::class)]
    private ?CommentaireStatus $statut = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livre $livre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAuteur(): ?string
    {
        return $this->nomAuteur;
    }

    public function setNomAuteur(string $nomAuteur): static
    {
        $this->nomAuteur = $nomAuteur;

        return $this;
    }

    public function getMailAuteur(): ?string
    {
        return $this->mailAuteur;
    }

    public function setMailAuteur(string $mailAuteur): static
    {
        $this->mailAuteur = $mailAuteur;
 
        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeImmutable $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeImmutable
    {
        return $this->date_publication;
    }

    public function setDatePublication(\DateTimeImmutable $date_publication): static
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getStatut(): ?CommentaireStatus
    {
        return $this->statut;
    }

    public function setStatut(CommentaireStatus $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): static
    {
        $this->livre = $livre;

        return $this;
    }
}
