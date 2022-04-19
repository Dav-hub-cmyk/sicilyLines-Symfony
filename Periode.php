<?php

namespace App\Entity;

use App\Repository\PeriodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PeriodeRepository::class)
 */
class Periode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\OneToMany(targetEntity=LiaisonPeriodeType::class, mappedBy="periode")
     */
    private $liaisonPeriodeTypes;

    public function __construct()
    {
        $this->liaisonPeriodeTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * @return Collection|LiaisonPeriodeType[]
     */
    public function getLiaisonPeriodeTypes(): Collection
    {
        return $this->liaisonPeriodeTypes;
    }

    public function addLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if (!$this->liaisonPeriodeTypes->contains($liaisonPeriodeType)) {
            $this->liaisonPeriodeTypes[] = $liaisonPeriodeType;
            $liaisonPeriodeType->setPeriode($this);
        }

        return $this;
    }

    public function removeLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if ($this->liaisonPeriodeTypes->removeElement($liaisonPeriodeType)) {
            // set the owning side to null (unless already changed)
            if ($liaisonPeriodeType->getPeriode() === $this) {
                $liaisonPeriodeType->setPeriode(null);
            }
        }

        return $this;
    }
}
