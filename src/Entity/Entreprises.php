<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Entreprises extends User
{
    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $fonctionEntreprise;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sirenEntreprise;

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

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

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

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ENTREPRISES';

        return array_unique($roles);
    }

    public function __toString()
    {
        return $this->nomEntreprise;
    }
}
