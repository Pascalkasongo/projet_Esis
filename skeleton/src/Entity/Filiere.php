<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiliereRepository::class)]
class Filiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_filiere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFiliere(): ?string
    {
        return $this->nom_filiere;
    }

    public function setNomFiliere(string $nom_filiere): static
    {
        $this->nom_filiere = $nom_filiere;

        return $this;
    }
}
