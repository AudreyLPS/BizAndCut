<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admins
 *
 * @ORM\Table(name="admins")
 * @ORM\Entity
 */
class Admins
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifiantAdmin;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $mdpAdmin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deletedAdmin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdmin(): ?string
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin(string $nomAdmin): self
    {
        $this->nomAdmin = $nomAdmin;

        return $this;
    }

    public function getPrenomAdmin(): ?string
    {
        return $this->prenomAdmin;
    }

    public function setPrenomAdmin(string $prenomAdmin): self
    {
        $this->prenomAdmin = $prenomAdmin;

        return $this;
    }

    public function getIdentifiantAdmin(): ?string
    {
        return $this->identifiantAdmin;
    }

    public function setIdentifiantAdmin(string $identifiantAdmin): self
    {
        $this->identifiantAdmin = $identifiantAdmin;

        return $this;
    }

    public function getMdpAdmin(): ?string
    {
        return $this->mdpAdmin;
    }

    public function setMdpAdmin(string $mdpAdmin): self
    {
        $this->mdpAdmin = $mdpAdmin;

        return $this;
    }

    public function getDeletedAdmin(): ?bool
    {
        return $this->deletedAdmin;
    }

    public function setDeletedAdmin(bool $deletedAdmin): self
    {
        $this->deletedAdmin = $deletedAdmin;

        return $this;
    }


}
