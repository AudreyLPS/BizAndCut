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
     * @var int
     *
     * @ORM\Column(name="id_coiffeur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite_coiffeur", type="string", length=50, nullable=false)
     */
    private $civiliteCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_coiffeur", type="string", length=255, nullable=false)
     */
    private $nomCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_coiffeur", type="string", length=255, nullable=false)
     */
    private $prenomCoiffeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="nb_annees_exp", type="boolean", nullable=false)
     */
    private $nbAnneesExp;

    /**
     * @var bool
     *
     * @ORM\Column(name="type_coiffeur", type="boolean", nullable=false)
     */
    private $typeCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="email_coiffeur", type="string", length=255, nullable=false)
     */
    private $emailCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_coiffeur", type="string", length=20, nullable=false)
     */
    private $telephoneCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_coiffeur", type="string", length=500, nullable=false)
     */
    private $adresseCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_coiffeur", type="string", length=255, nullable=false)
     */
    private $villeCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_coiffeur", type="string", length=10, nullable=false)
     */
    private $cpCoiffeur;

    /**
     * @var int
     *
     * @ORM\Column(name="distance_coiffeur", type="integer", nullable=false)
     */
    private $distanceCoiffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_coiffeur", type="string", length=255, nullable=false)
     */
    private $mdpCoiffeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted_coiffeur", type="boolean", nullable=false)
     */
    private $deletedCoiffeur;

    public function getIdCoiffeur(): ?int
    {
        return $this->idCoiffeur;
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
