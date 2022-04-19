<?php

namespace App\Entity;

use App\Repository\LiaisonPeriodeTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=LiaisonPeriodeTypeRepository::class)
 * @UniqueEntity(
 *  fields={"liaison","periode","type"},
 *  message="Cet enregistrement existe déjà"
 * )
 */
class LiaisonPeriodeType
{



    /**
     *  @ORM\Id
     * @ORM\ManyToOne(targetEntity=Liaison::class, inversedBy="liaisonPeriodeTypes")
     */
    private $liaison;

    /**
     *  @ORM\Id
     * @ORM\ManyToOne(targetEntity=Periode::class, inversedBy="liaisonPeriodeTypes")
     */
    private $periode;

    /**
     *  @ORM\Id
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="liaisonPeriodeTypes")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiaison(): ?Liaison
    {
        return $this->liaison;
    }

    public function setLiaison(?Liaison $liaison): self
    {
        $this->liaison = $liaison;

        return $this;
    }

    public function getPeriode(): ?Periode
    {
        return $this->periode;
    }

    public function setPeriode(?Periode $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTarif(): ?int
    {
        return $this->tarif;
    }

    public function setTarif(int $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
}
