<?php

namespace App\Entity;

use App\Enum\LivreStatus;
use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?int $nombrePages = null;

    #[ORM\Column(length: 500)]
    private ?string $synopsis = null;

    #[ORM\Column(length: 255)]
    private ?LivreStatus $statut = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Editeur $editeur = null;

    /**
     * @var Collection<int, Auteur>
     */
    #[ORM\ManyToMany(targetEntity: Auteur::class, inversedBy: 'livres')]
    private Collection $auteurs;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'livre', orphanRemoval: true)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

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
        return $this->nombrePages;
    }

    public function setNombrePages(int $nombrePages): static
    {
        $this->nombrePages = $nombrePages;

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

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): static
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * @return Collection<int, Auteur>
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): static
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs->add($auteur);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): static
    {
        $this->auteurs->removeElement($auteur);

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setLivre($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getLivre() === $this) {
                $commentaire->setLivre(null);
            }
        }

        return $this;
    }
}
