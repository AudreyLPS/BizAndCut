<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis")
 * @ORM\Entity
 */
class Devis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    /*
     * @ORM\Column(type="integer")
     */
    /*private $numeroDevis; */

    /**
     * @ORM\Column(type="integer")
     */
    private $nbParticipantsDevis;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEvenementDevis;

   /**
     * @ORM\Column(type="integer")
     */
    private $nbHeuresDevis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DevisStatut", inversedBy="devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devisStatut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?Entreprises
    {
        return $this->entreprise;
    }

    public function setEntreprise(Entreprises $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getNumeroDevis(): ?int
    {
        return $this->numeroDevis;
    }

    public function setNumeroDevis(int $numeroDevis): self
    {
        $this->numeroDevis = $numeroDevis;

        return $this;
    }

    public function getNbParticipantsDevis(): ?int
    {
        return $this->nbParticipantsDevis;
    }

    public function setNbParticipantsDevis(int $nbParticipantsDevis): self
    {
        $this->nbParticipantsDevis = $nbParticipantsDevis;

        return $this;
    }

    public function getDateEvenementDevis(): ?\DateTimeInterface
    {
        return $this->dateEvenementDevis;
    }

    public function setDateEvenementDevis(\DateTimeInterface $dateEvenementDevis): self
    {
        $this->dateEvenementDevis = $dateEvenementDevis;

        return $this;
    }

    public function getNbHeuresDevis(): ?int
    {
        return $this->nbHeuresDevis;
    }

    public function setNbHeuresDevis(int $nbHeuresDevis): self
    {
        $this->nbHeuresDevis = $nbHeuresDevis;

        return $this;
    }

    public function getDevisStatut(): ?DevisStatut
    {
        return $this->devisStatut;
    }

    public function setDevisStatut(DevisStatut $devisStatut): self
    {
        $this->devisStatut = $devisStatut;

        return $this;
    }


}
