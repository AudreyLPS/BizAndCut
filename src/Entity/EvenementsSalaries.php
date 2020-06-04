<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvenementsSalaries
 *
 * @ORM\Table(name="evenements_salaries")
 * @ORM\Entity
 */
class EvenementsSalaries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Devis", inversedBy="evenements_salaries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(Devis $devis): self
    {
        $this->devis = $devis;

        return $this;
    }
}
