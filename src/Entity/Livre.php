<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use App\Enum\LivreStatus;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroISBN = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_sortie = null;

    #[ORM\Column]
    private ?int $nombre_pages = null;

    #[ORM\Column(length: 500)]
    private ?string $synopsis = null;

    #[ORM\Column(length: 255)]
    private ?LivreStatus $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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

    public function getNumeroISBN(): ?string
    {
        return $this->numeroISBN;
    }

    public function setNumeroISBN(string $numeroISBN): static
    {
        $this->numeroISBN = $numeroISBN;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeImmutable
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeImmutable $date_sortie): static
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getNombrePages(): ?int
    {
        return $this->nombre_pages;
    }

    public function setNombrePages(int $nombre_pages): static
    {
        $this->nombre_pages = $nombre_pages;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getStatut(): ?LivreStatus
    {
        return $this->statut;
    }

    public function setStatut(LivreStatus $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
