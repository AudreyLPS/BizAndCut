<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprises
 *
 * @ORM\Table(name="entreprises")
 * @ORM\Entity
 */
class Entreprises
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_entreprise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=500, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_nom_user_entreprise", type="string", length=500, nullable=false)
     */
    private $prenomNomUserEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_entreprise", type="string", length=500, nullable=false)
     */
    private $fonctionEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="siren_entreprise", type="string", length=10, nullable=false)
     */
    private $sirenEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_entreprise", type="string", length=500, nullable=false)
     */
    private $statutEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="email_entreprise", type="string", length=255, nullable=false)
     */
    private $emailEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_entreprise", type="string", length=20, nullable=false)
     */
    private $telephoneEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_entreprise", type="string", length=500, nullable=false)
     */
    private $adresseEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_entreprise", type="string", length=255, nullable=false)
     */
    private $villeEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_entreprise", type="string", length=20, nullable=false)
     */
    private $cpEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_entreprise", type="string", length=255, nullable=false)
     */
    private $mdpEntreprise;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted_entreprise", type="boolean", nullable=false)
     */
    private $deletedEntreprise;

    public function getIdEntreprise(): ?int
    {
        return $this->idEntreprise;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getPrenomNomUserEntreprise(): ?string
    {
        return $this->prenomNomUserEntreprise;
    }

    public function setPrenomNomUserEntreprise(string $prenomNomUserEntreprise): self
    {
        $this->prenomNomUserEntreprise = $prenomNomUserEntreprise;

        return $this;
    }

    public function getFonctionEntreprise(): ?string
    {
        return $this->fonctionEntreprise;
    }

    public function setFonctionEntreprise(string $fonctionEntreprise): self
    {
        $this->fonctionEntreprise = $fonctionEntreprise;

        return $this;
    }

    public function getSirenEntreprise(): ?string
    {
        return $this->sirenEntreprise;
    }

    public function setSirenEntreprise(string $sirenEntreprise): self
    {
        $this->sirenEntreprise = $sirenEntreprise;

        return $this;
    }

    public function getStatutEntreprise(): ?string
    {
        return $this->statutEntreprise;
    }

    public function setStatutEntreprise(string $statutEntreprise): self
    {
        $this->statutEntreprise = $statutEntreprise;

        return $this;
    }

    public function getEmailEntreprise(): ?string
    {
        return $this->emailEntreprise;
    }

    public function setEmailEntreprise(string $emailEntreprise): self
    {
        $this->emailEntreprise = $emailEntreprise;

        return $this;
    }

    public function getTelephoneEntreprise(): ?string
    {
        return $this->telephoneEntreprise;
    }

    public function setTelephoneEntreprise(string $telephoneEntreprise): self
    {
        $this->telephoneEntreprise = $telephoneEntreprise;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresseEntreprise;
    }

    public function setAdresseEntreprise(string $adresseEntreprise): self
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    public function getVilleEntreprise(): ?string
    {
        return $this->villeEntreprise;
    }

    public function setVilleEntreprise(string $villeEntreprise): self
    {
        $this->villeEntreprise = $villeEntreprise;

        return $this;
    }

    public function getCpEntreprise(): ?string
    {
        return $this->cpEntreprise;
    }

    public function setCpEntreprise(string $cpEntreprise): self
    {
        $this->cpEntreprise = $cpEntreprise;

        return $this;
    }

    public function getMdpEntreprise(): ?string
    {
        return $this->mdpEntreprise;
    }

    public function setMdpEntreprise(string $mdpEntreprise): self
    {
        $this->mdpEntreprise = $mdpEntreprise;

        return $this;
    }

    public function getDeletedEntreprise(): ?bool
    {
        return $this->deletedEntreprise;
    }

    public function setDeletedEntreprise(bool $deletedEntreprise): self
    {
        $this->deletedEntreprise = $deletedEntreprise;

        return $this;
    }


}
