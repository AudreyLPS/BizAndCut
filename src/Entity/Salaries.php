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
     * @var int
     *
     * @ORM\Column(name="id_salarie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSalarie;

    /**
     * @var int
     *
     * @ORM\Column(name="entreprise_id", type="integer", nullable=false)
     */
    private $entrepriseId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salarie", type="string", length=255, nullable=false)
     */
    private $nomSalarie;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_salarie", type="string", length=255, nullable=false)
     */
    private $prenomSalarie;

    /**
     * @var string
     *
     * @ORM\Column(name="email_salarie", type="string", length=255, nullable=false)
     */
    private $emailSalarie;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_salarie", type="string", length=255, nullable=false)
     */
    private $mdpSalarie;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted_salarie", type="boolean", nullable=false)
     */
    private $deletedSalarie;

    public function getIdSalarie(): ?int
    {
        return $this->idSalarie;
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
