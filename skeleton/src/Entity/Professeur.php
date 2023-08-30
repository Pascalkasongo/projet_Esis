<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_professeur = null;

    #[ORM\Column(length: 30)]
    private ?string $grade = null;

    #[ORM\Column(length: 10)]
    private ?string $genre = null;

    #[ORM\Column(length: 15)]
    private ?string $numero_telephone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProfesseur(): ?string
    {
        return $this->nom_professeur;
    }

    public function setNomProfesseur(string $nom_professeur): static
    {
        $this->nom_professeur = $nom_professeur;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(string $numero_telephone): static
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }
}
