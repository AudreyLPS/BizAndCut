<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * Coiffeurs
     *
     * @ORM\Table(name="coiffeurs")
     * @ORM\Entity
     */
class Coiffeurs
{
   /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $civiliteCoiffeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCoiffeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomCoiffeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $nbAnneesExp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $typeCoiffeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailCoiffeur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telephoneCoiffeur;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $adresseCoiffeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeCoiffeur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cpCoiffeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $distanceCoiffeur;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $mdpCoiffeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deletedCoiffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiviliteCoiffeur(): ?string
    {
        return $this->civiliteCoiffeur;
    }

    public function setCiviliteCoiffeur(string $civiliteCoiffeur): self
    {
        $this->civiliteCoiffeur = $civiliteCoiffeur;

        return $this;
    }

    public function getNomCoiffeur(): ?string
    {
        return $this->nomCoiffeur;
    }

    public function setNomCoiffeur(string $nomCoiffeur): self
    {
        $this->nomCoiffeur = $nomCoiffeur;

        return $this;
    }

    public function getPrenomCoiffeur(): ?string
    {
        return $this->prenomCoiffeur;
    }

    public function setPrenomCoiffeur(string $prenomCoiffeur): self
    {
        $this->prenomCoiffeur = $prenomCoiffeur;

        return $this;
    }

    public function getNbAnneesExp(): ?bool
    {
        return $this->nbAnneesExp;
    }

    public function setNbAnneesExp(bool $nbAnneesExp): self
    {
        $this->nbAnneesExp = $nbAnneesExp;

        return $this;
    }

    public function getTypeCoiffeur(): ?bool
    {
        return $this->typeCoiffeur;
    }

    public function setTypeCoiffeur(bool $typeCoiffeur): self
    {
        $this->typeCoiffeur = $typeCoiffeur;

        return $this;
    }

    public function getEmailCoiffeur(): ?string
    {
        return $this->emailCoiffeur;
    }

    public function setEmailCoiffeur(string $emailCoiffeur): self
    {
        $this->emailCoiffeur = $emailCoiffeur;

        return $this;
    }

    public function getTelephoneCoiffeur(): ?string
    {
        return $this->telephoneCoiffeur;
    }

    public function setTelephoneCoiffeur(string $telephoneCoiffeur): self
    {
        $this->telephoneCoiffeur = $telephoneCoiffeur;

        return $this;
    }

    public function getAdresseCoiffeur(): ?string
    {
        return $this->adresseCoiffeur;
    }

    public function setAdresseCoiffeur(string $adresseCoiffeur): self
    {
        $this->adresseCoiffeur = $adresseCoiffeur;

        return $this;
    }

    public function getVilleCoiffeur(): ?string
    {
        return $this->villeCoiffeur;
    }

    public function setVilleCoiffeur(string $villeCoiffeur): self
    {
        $this->villeCoiffeur = $villeCoiffeur;

        return $this;
    }

    public function getCpCoiffeur(): ?string
    {
        return $this->cpCoiffeur;
    }

    public function setCpCoiffeur(string $cpCoiffeur): self
    {
        $this->cpCoiffeur = $cpCoiffeur;

        return $this;
    }

    public function getDistanceCoiffeur(): ?int
    {
        return $this->distanceCoiffeur;
    }

    public function setDistanceCoiffeur(int $distanceCoiffeur): self
    {
        $this->distanceCoiffeur = $distanceCoiffeur;

        return $this;
    }

    public function getMdpCoiffeur(): ?string
    {
        return $this->mdpCoiffeur;
    }

    public function setMdpCoiffeur(string $mdpCoiffeur): self
    {
        $this->mdpCoiffeur = $mdpCoiffeur;

        return $this;
    }

    public function getDeletedCoiffeur(): ?bool
    {
        return $this->deletedCoiffeur;
    }

    public function setDeletedCoiffeur(bool $deletedCoiffeur): self
    {
        $this->deletedCoiffeur = $deletedCoiffeur;

        return $this;
    }

}
