<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="date")
     */
    private $dateEvenement;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $heureDEvenement;

     /**
     * @ORM\Column(type="string", length=10)
     */
    private $heureFEvenement;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descriptionEvenement;

     /**
     * @ORM\Column(type="integer")
     */
    private $nbCoiffeursEvenement = '1';

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getHeureDEvenement(): ?string
    {
        return $this->heureDEvenement;
    }

    public function setHeureDEvenement(string $heureDEvenement): self
    {
        $this->heureDEvenement = $heureDEvenement;

        return $this;
    }

    public function getDescriptionEvenement(): ?string
    {
        return $this->descriptionEvenement;
    }

    public function setDescriptionEvenement(string $descriptionEvenement): self
    {
        $this->descriptionEvenement = $descriptionEvenement;

        return $this;
    }

    public function getHeureFEvenement(): ?string
    {
        return $this->heureFEvenement;
    }

    public function setHeureFEvenement(string $heureFEvenement): self
    {
        $this->heureFEvenement = $heureFEvenement;

        return $this;
    }

    public function getNbCoiffeursEvenement(): ?int
    {
        return $this->nbCoiffeursEvenement;
    }

    public function setNbCoiffeursEvenement(int $nbCoiffeursEvenement): self
    {
        $this->nbCoiffeursEvenement = $nbCoiffeursEvenement;

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

}
