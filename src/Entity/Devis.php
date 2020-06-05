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

    /**
     * @ORM\Column(type="integer")
     */
    private $nbParticipants;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $heureDebut;

     /**
     * @ORM\Column(type="string", length=10)
     */
    private $heureFin;
 
    /**
     * @ORM\Column(type="string", length=500)
     */
    private $libelle;

     /**
     * @ORM\Column(type="integer")
     */
    private $nbCoiffeurs = '1';

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

    public function getNbParticipants(): ?int
    {
        return $this->nbParticipants;
    }

    public function setNbParticipants(int $nbParticipants): self
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getHeureDebut(): ?string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->heureFin;
    }

    public function setHeureFin(string $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getNbCoiffeurs(): ?int
    {
        return $this->nbCoiffeurs;
    }

    public function setNbCoiffeurs(int $nbCoiffeurs): self
    {
        $this->nbCoiffeurs = $nbCoiffeurs;

        return $this;
    }
}
