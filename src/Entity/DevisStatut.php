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
     * @var int
     *
     * @ORM\Column(name="id_devis_statut", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevisStatut;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_devis_statut", type="string", length=500, nullable=false)
     */
    private $texteDevisStatut;

    public function getIdDevisStatut(): ?int
    {
        return $this->idDevisStatut;
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
