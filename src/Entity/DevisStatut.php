<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DevisStatut
 *
 * @ORM\Table(name="devis_statut")
 * @ORM\Entity
 */ 
class DevisStatut
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $texteDevisStatut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteDevisStatut(): ?string
    {
        return $this->texteDevisStatut;
    }

    public function setTexteDevisStatut(string $texteDevisStatut): self
    {
        $this->texteDevisStatut = $texteDevisStatut;

        return $this;
    }
}