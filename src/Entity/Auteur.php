<?php

namespace App\Entity;

use App\Enum\NationaliteEnum;
use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom et prénom de l'auteur ne peut pas être vide.")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Le nom et prénom de l'auteur doit comporter au moins {{ limit }} caractères.",
        maxMessage: "Le nom et prénom de l'auteur ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $nomPrenom = null;


    #[ORM\Column]
    #[Assert\NotBlank(message: "La date de naissance de l'auteur ne peut pas être vide.")]
    #[Assert\LessThan("today", message: "La date de naissance doit être antérieure à aujourd'hui.")]
    #[Assert\Type("\DateTimeInterface", message: "La date de naissance doit être une date valide.")]
    private ?\DateTimeImmutable $date_naissance = null;

    #[ORM\Column(nullable: true )]
    #[Assert\Type("\DateTimeInterface", message: "La date de décès doit être une date valide.")]
    #[Assert\GreaterThan(propertyPath: "date_naissance", message: "La date de décès doit être postérieure à la date de naissance.")]
    private ?\DateTimeImmutable $date_deces = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La nationalité de l'auteur ne peut pas être vide.")]
    private ?NationaliteEnum $nationalite = null;

    /**
     * @var Collection<int, Livre>
     */
    #[ORM\ManyToMany(targetEntity: Livre::class, inversedBy: 'auteurs')]
    private Collection $livres;
 
    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    public function setNomPrenom(string $nomPrenom): static
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    } 

    public function getDateNaissance(): ?\DateTimeImmutable
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeImmutable $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDateDeces(): ?\DateTimeImmutable
    {
        return $this->date_deces;
    }

    public function setDateDeces(?\DateTimeImmutable $date_deces): static
    {
        $this->date_deces = $date_deces;

        return $this;
    }

    public function getNationalite(): ?NationaliteEnum
    {
        return $this->nationalite;
    }

    public function setNationalite(NationaliteEnum $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * @return Collection<int, Livre>
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): static
    {
        if (!$this->livres->contains($livre)) {
            $this->livres->add($livre);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): static
    {
        $this->livres->removeElement($livre);

        return $this;
    }
}
