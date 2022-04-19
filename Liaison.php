<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LiaisonRepository::class)
 */
class Liaison
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
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Secteur::class, inversedBy="liaisons")
     */
    private $secteur;

    /**
     * @ORM\OneToMany(targetEntity=LiaisonPeriodeType::class, mappedBy="liaison")
     */
    private $liaisonPeriodeTypes;

    /**
     * @ORM\ManyToOne(targetEntity=port::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $port_depart;

    /**
     * @ORM\ManyToOne(targetEntity=port::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $port_arrive;





    public function __construct()
    {
        $this->liaisonPeriodeTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

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
            $liaisonPeriodeType->setLiaison($this);
        }

        return $this;
    }

    public function removeLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if ($this->liaisonPeriodeTypes->removeElement($liaisonPeriodeType)) {
            // set the owning side to null (unless already changed)
            if ($liaisonPeriodeType->getLiaison() === $this) {
                $liaisonPeriodeType->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPortDepart(): ?port
    {
        return $this->port_depart;
    }

    public function setPortDepart(?port $port_depart): self
    {
        $this->port_depart = $port_depart;

        return $this;
    }

    public function getPortArrive(): ?port
    {
        return $this->port_arrive;
    }

    public function setPortArrive(?port $port_arrive): self
    {
        $this->port_arrive = $port_arrive;

        return $this;
    }




}
