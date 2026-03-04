<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use App\Enum\LivreStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{ 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le titre ne peut pas être vide.")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Le titre doit comporter au moins {{ limit }} caractères.",
        maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'image du livre ne peut pas être vide.")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "L'image du livre doit comporter au moins {{ limit }} caractères.",
        maxMessage: "L'image du livre ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le numéro ISBN du livre ne peut pas être vide.")]
    #[Assert\Length(
        min: 10,
        max: 13,
        minMessage: "Le numéro ISBN doit comporter au moins {{ limit }} caractères.",
        maxMessage: "Le numéro ISBN ne peut pas dépasser {{ limit }} caractères."
    )]
    #[Assert\Type(
        type: 'isbn',
        message: "Le numéro ISBN doit être un format valide."
    )]
    private ?string $numeroISBN = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La date de sortie du livre ne peut pas être vide.")]
    #[Assert\LessThanOrEqual(
        value: "today",
        message: "La date de sortie doit être une date passée ou aujourd'hui."
    )]
    private ?\DateTimeImmutable $date_sortie = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le nombre de pages du livre ne peut pas être vide.")]
    #[Assert\Positive(message: "Le nombre de pages doit être un nombre positif.")]
    #[Assert\LessThanOrEqual(
        value: 10000,
        message: "Le nombre de pages ne peut pas dépasser {{ compared_value }}."
    )]
    #[Assert\Type(
        type: 'integer',
        message: "Le nombre de pages doit être un nombre entier."
    )]
    private ?int $nombre_pages = null;

    #[ORM\Column(length: 500)]
    #[Assert\Length(
        max: 500,
        maxMessage: "Le synopsis ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $synopsis = null;

    #[ORM\Column(enumType: LivreStatus::class)]
    #[Assert\NotBlank(message: "Le statut du livre ne peut pas être vide.")]
    private ?LivreStatus $statut = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Editeur $editeur = null;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'livre', orphanRemoval: true)]
    private Collection $commentaires;

    /**
     * @var Collection<int, Auteur>
     */
    #[ORM\ManyToMany(targetEntity: Auteur::class, mappedBy: 'livre')]
    private Collection $auteurs;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->auteurs = new ArrayCollection();
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
            $auteur->addLivre($this);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): static
    {
        if ($this->auteurs->removeElement($auteur)) {
            $auteur->removeLivre($this);
        }

        return $this;
    }
}
