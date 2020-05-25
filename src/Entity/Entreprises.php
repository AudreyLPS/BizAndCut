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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $prenomNomUserEntreprise;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $fonctionEntreprise;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sirenEntreprise;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $statutEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailEntreprise;

   /**
     * @ORM\Column(type="string", length=20)
     */
    private $telephoneEntreprise;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $adresseEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeEntreprise;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cpEntreprise;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $mdpEntreprise;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deletedEntreprise = 0;

    public function getId(): ?int
    {
        return $this->id;
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
