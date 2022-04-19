<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BateauRepository::class)
 */
class Bateau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $longueur;

    /**
     * @ORM\Column(type="float")
     */
    private $largeur;

    /**
     * @ORM\Column(type="float")
     */
    private $vitesse;

    /**
     * @ORM\OneToMany(targetEntity=Traversee::class, mappedBy="bateau")
     */
    private $traversees;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * @return Collection|Traversee[]
     */
    public function getTraversees(): Collection
    {
        return $this->traversees;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversees->contains($traversee)) {
            $this->traversees[] = $traversee;
            $traversee->setBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getBateau() === $this) {
                $traversee->setBateau(null);
            }
        }

        return $this;
    }
}
