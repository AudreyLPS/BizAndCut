<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Satisfaction
 *
 * @ORM\Table(name="satisfaction")
 * @ORM\Entity
 */ 
class Satisfaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Coiffeurs", inversedBy="satisfaction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coiffeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Devis", inversedBy="satisfaction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoiffeur(): ?Coiffeurs
    {
        return $this->coiffeur;
    }

    public function setCoiffeur(Coiffeurs $coiffeur): self
    {
        $this->coiffeur = $coiffeur;

        return $this;
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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

}
