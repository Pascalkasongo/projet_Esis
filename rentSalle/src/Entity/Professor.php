<?php

namespace App\Entity;

use App\Repository\ProfessorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessorRepository::class)]
class Professor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_professor = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_professor = null;

    #[ORM\Column(length: 255)]
    private ?string $post_nom = null;

    #[ORM\Column(length: 10)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $grade = null;

    #[ORM\Column(length: 30)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProfessor(): ?string
    {
        return $this->nom_professor;
    }

    public function setNomProfessor(string $nom_professor): static
    {
        $this->nom_professor = $nom_professor;

        return $this;
    }

    public function getPrenomProfessor(): ?string
    {
        return $this->prenom_professor;
    }

    public function setPrenomProfessor(string $prenom_professor): static
    {
        $this->prenom_professor = $prenom_professor;

        return $this;
    }

    public function getPostNom(): ?string
    {
        return $this->post_nom;
    }

    public function setPostNom(string $post_nom): static
    {
        $this->post_nom = $post_nom;

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

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
