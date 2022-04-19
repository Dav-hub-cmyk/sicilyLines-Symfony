<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PortRepository::class)
 */
class Port
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
     * @ORM\OneToMany(targetEntity=Liaison::class, mappedBy="port_depart")
     */
    private $port_arrivee;

    public function __construct()
    {
        $this->port_arrivee = new ArrayCollection();
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

    /**
     * @return Collection|Liaison[]
     */
    public function getPortArrivee(): Collection
    {
        return $this->port_arrivee;
    }

    public function addPortArrivee(Liaison $portArrivee): self
    {
        if (!$this->port_arrivee->contains($portArrivee)) {
            $this->port_arrivee[] = $portArrivee;
            $portArrivee->setPortDepart($this);
        }

        return $this;
    }

    public function removePortArrivee(Liaison $portArrivee): self
    {
        if ($this->port_arrivee->removeElement($portArrivee)) {
            // set the owning side to null (unless already changed)
            if ($portArrivee->getPortDepart() === $this) {
                $portArrivee->setPortDepart(null);
            }
        }

        return $this;
    }
}
