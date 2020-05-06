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
     * @var int
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_admin", type="string", length=255, nullable=false)
     */
    private $nomAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_admin", type="string", length=255, nullable=false)
     */
    private $prenomAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant_admin", type="string", length=255, nullable=false)
     */
    private $identifiantAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_admin", type="string", length=255, nullable=false)
     */
    private $mdpAdmin;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted_admin", type="boolean", nullable=false)
     */
    private $deletedAdmin;

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
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
