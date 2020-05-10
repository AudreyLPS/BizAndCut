<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salaries
 *
 * @ORM\Table(name="salaries")
 * @ORM\Entity
 */
class Salaries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="integer")
     */
    private $entrepriseId;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomSalarie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomSalarie;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailSalarie;

     /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $mdpSalarie;

     /**
     * @ORM\Column(type="boolean")
     */
    private $deletedSalarie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrepriseId(): ?int
    {
        return $this->entrepriseId;
    }

    public function setEntrepriseId(int $entrepriseId): self
    {
        $this->entrepriseId = $entrepriseId;

        return $this;
    }

    public function getNomSalarie(): ?string
    {
        return $this->nomSalarie;
    }

    public function setNomSalarie(string $nomSalarie): self
    {
        $this->nomSalarie = $nomSalarie;

        return $this;
    }

    public function getPrenomSalarie(): ?string
    {
        return $this->prenomSalarie;
    }

    public function setPrenomSalarie(string $prenomSalarie): self
    {
        $this->prenomSalarie = $prenomSalarie;

        return $this;
    }

    public function getEmailSalarie(): ?string
    {
        return $this->emailSalarie;
    }

    public function setEmailSalarie(string $emailSalarie): self
    {
        $this->emailSalarie = $emailSalarie;

        return $this;
    }

    public function getMdpSalarie(): ?string
    {
        return $this->mdpSalarie;
    }

    public function setMdpSalarie(string $mdpSalarie): self
    {
        $this->mdpSalarie = $mdpSalarie;

        return $this;
    }

    public function getDeletedSalarie(): ?bool
    {
        return $this->deletedSalarie;
    }

    public function setDeletedSalarie(bool $deletedSalarie): self
    {
        $this->deletedSalarie = $deletedSalarie;

        return $this;
    }


}
