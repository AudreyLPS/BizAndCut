<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propositions
 *
 * @ORM\Table(name="propositions")
 * @ORM\Entity
 */
class Propositions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Devis", inversedBy="propositions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Coiffeurs", inversedBy="propositions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coiffeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant; 

    /**
     * @ORM\Column(type="boolean")
     */
    private $validationBC;

    /**
     * @ORM\Column(type="date")
     */
    private $dateProposition;

   /**
     * @ORM\Column(type="boolean")
     */
    private $validationEntreprise;


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

    public function getCoiffeur(): ?Coiffeurs
    {
        return $this->coiffeur;
    }

    public function setCoiffeur(Coiffeurs $coiffeur): self
    {
        $this->coiffeur = $coiffeur;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getValidationBC(): ?bool
    {
        return $this->validationBC;
    }

    public function setValidationBC(bool $validationBC): self
    {
        $this->validationBC = $validationBC;

        return $this;
    }

    public function getDateProposition(): ?\DateTimeInterface
    {
        return $this->dateProposition;
    }

    public function setDateProposition(\DateTimeInterface $dateProposition): self
    {
        $this->dateProposition = $dateProposition;

        return $this;
    }

    public function getValidationEntreprise(): ?bool
    {
        return $this->validationEntreprise;
    }

    public function setValidationEntreprise(bool $validationEntreprise): self
    {
        $this->validationEntreprise = $validationEntreprise;

        return $this;
    }
}
