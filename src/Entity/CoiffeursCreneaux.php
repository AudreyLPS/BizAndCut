<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoiffeursCreneaux
 *
 * @ORM\Table(name="coiffeurs_creneaux")
 * @ORM\Entity
 */
class CoiffeursCreneaux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $evenementId;

    /**
     * @ORM\Column(type="integer")
     */
    private $coiffeurId;

    /**
     * @ORM\Column(type="integer")
     */
    private $horairesCoiffeurCreneau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenementId(): ?int
    {
        return $this->evenementId;
    }

    public function setEvenementId(int $evenementId): self
    {
        $this->evenementId = $evenementId;

        return $this;
    }

    public function getCoiffeurId(): ?int
    {
        return $this->coiffeurId;
    }

    public function setCoiffeurId(int $coiffeurId): self
    {
        $this->coiffeurId = $coiffeurId;

        return $this;
    }

    public function getHorairesCoiffeurCreneau(): ?int
    {
        return $this->horairesCoiffeurCreneau;
    }

    public function setHorairesCoiffeurCreneau(int $horairesCoiffeurCreneau): self
    {
        $this->horairesCoiffeurCreneau = $horairesCoiffeurCreneau;

        return $this;
    }


}
