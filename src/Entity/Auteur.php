<?php

namespace App\Entity;

use App\Enum\NationaliteEnum;
use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity(fields: ['nomPrenom'], message: 'Un auteur avec ce nom existe déjà.')]
#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\Length(
        min: 10,
        max: 50,
        minMessage: 'Le nom de l\'auteur doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Le nom de l\'auteur ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[Assert\NotBlank(message: 'Le nom de l\'auteur ne peut pas être vide.')]
    #[ORM\Column(length: 255)]
    private ?string $nomPrenom = null;

    #[Assert\NotBlank(message: 'La date de naissance ne peut pas être vide.')]
    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $date_naissance = null;

    #[Assert\GreaterThan(propertyPath: 'date_naissance')]
    #[ORM\Column(nullable: true, type: 'datetime_immutable')]
    private ?\DateTimeImmutable $date_deces = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?NationaliteEnum $nationalite = null;

    /**
     * @var Collection<int, Livre>
     */
    #[ORM\ManyToMany(targetEntity: Livre::class, mappedBy: 'auteurs')]
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

    public function setNomPrenom(string $nom): static
    {
        $this->nomPrenom = $nom;

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
            $livre->addAuteur($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): static
    {
        if ($this->livres->removeElement($livre)) {
            $livre->removeAuteur($this);
        }

        return $this;
    }
}
