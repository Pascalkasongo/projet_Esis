<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_promotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPromotion(): ?string
    {
        return $this->nom_promotion;
    }

    public function setNomPromotion(string $nom_promotion): static
    {
        $this->nom_promotion = $nom_promotion;

        return $this;
    }
}
