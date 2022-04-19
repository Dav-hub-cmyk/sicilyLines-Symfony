<?php

namespace App\Entity;

use App\Repository\ContenirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenirRepository::class)
 */
class Contenir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_max;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMax(): ?int
    {
        return $this->nb_max;
    }

    public function setNbMax(int $nb_max): self
    {
        $this->nb_max = $nb_max;

        return $this;
    }
}
