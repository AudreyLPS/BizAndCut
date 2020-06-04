<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participations
 *
 * @ORM\Table(name="participations")
 * @ORM\Entity
 */
class Participations
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
}
