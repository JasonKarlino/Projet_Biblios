<?php

namespace App\Entity;

use App\Enum\NationaliteEnum;
use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPrenom = null;


    #[ORM\Column]
    private ?\DateTimeImmutable $date_naissance = null;

    #[ORM\Column(nullable: true )]
    private ?\DateTimeImmutable $date_deces = null;

    #[ORM\Column(length: 255)]
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
