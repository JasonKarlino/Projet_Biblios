<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use App\Enum\CommentaireStatus;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'auteur est obligatoire.")]
     #[Assert\Length(
         min: 3,
         max: 255,
         minMessage: "Le nom de l'auteur doit comporter au moins {{ limit }} caractères.",
         maxMessage: "Le nom de l'auteur ne peut pas dépasser {{ limit }} caractères."
     )]
     #[Assert\Type(type: 'string', message: "Le nom de l'auteur doit être une chaîne de caractères.")]
    private ?string $nomAuteur = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'adresse email de l'auteur est obligatoire.")]
    #[Assert\Email(message: "L'adresse email n'est pas valide.")]
    private ?string $mailAuteur = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La date de création est obligatoire.")]
    #[Assert\Type(type: 'datetime_immutable', message: "La date de création doit être une instance de DateTimeImmutable.")]
     #[Assert\LessThanOrEqual(
         propertyPath: 'date_publication',
         message: "La date de création doit être antérieure ou égale à la date de publication."
     )]
    private ?\DateTimeImmutable $date_creation = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La date de publication est obligatoire.")]
    #[Assert\Type(type: 'datetime_immutable', message: "La date de publication doit être une instance de DateTimeImmutable.")]
    #[Assert\GreaterThanOrEqual(
        propertyPath: 'date_creation',
        message: "La date de publication doit être postérieure ou égale à la date de création."
    )]
    private ?\DateTimeImmutable $date_publication = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le contenu du commentaire est obligatoire.")]
     #[Assert\Length(
         min: 10,
         max: 255,
         minMessage: "Le contenu du commentaire doit comporter au moins {{ limit }} caractères.",
         maxMessage: "Le contenu du commentaire ne peut pas dépasser {{ limit }} caractères."
     )]
     #[Assert\Type(type: 'string', message: "Le contenu du commentaire doit être une chaîne de caractères.")]
    private ?string $contenu = null;

    #[ORM\Column(enumType: CommentaireStatus::class)]
    #[Assert\NotBlank(message: "Le statut du commentaire est obligatoire.")]
    #[Assert\Type(type: CommentaireStatus::class, message: "Le statut du commentaire doit être une instance de CommentaireStatus.")]
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
