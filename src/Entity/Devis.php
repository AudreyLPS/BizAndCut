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
     * @var int
     *
     * @ORM\Column(name="id_devis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevis;

    /**
     * @var int
     *
     * @ORM\Column(name="entreprise_id", type="integer", nullable=false)
     */
    private $entrepriseId;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_devis", type="integer", nullable=false)
     */
    private $numeroDevis;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participants_devis", type="integer", nullable=false)
     */
    private $nbParticipantsDevis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_evenement_devis", type="date", nullable=false)
     */
    private $dateEvenementDevis;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_heures_devis", type="smallint", nullable=false)
     */
    private $nbHeuresDevis;

    /**
     * @var int
     *
     * @ORM\Column(name="devis_statut_id", type="smallint", nullable=false)
     */
    private $devisStatutId;

    public function getIdDevis(): ?int
    {
        return $this->idDevis;
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

    public function getNumeroDevis(): ?int
    {
        return $this->numeroDevis;
    }

    public function setNumeroDevis(int $numeroDevis): self
    {
        $this->numeroDevis = $numeroDevis;

        return $this;
    }

    public function getNbParticipantsDevis(): ?int
    {
        return $this->nbParticipantsDevis;
    }

    public function setNbParticipantsDevis(int $nbParticipantsDevis): self
    {
        $this->nbParticipantsDevis = $nbParticipantsDevis;

        return $this;
    }

    public function getDateEvenementDevis(): ?\DateTimeInterface
    {
        return $this->dateEvenementDevis;
    }

    public function setDateEvenementDevis(\DateTimeInterface $dateEvenementDevis): self
    {
        $this->dateEvenementDevis = $dateEvenementDevis;

        return $this;
    }

    public function getNbHeuresDevis(): ?int
    {
        return $this->nbHeuresDevis;
    }

    public function setNbHeuresDevis(int $nbHeuresDevis): self
    {
        $this->nbHeuresDevis = $nbHeuresDevis;

        return $this;
    }

    public function getDevisStatutId(): ?int
    {
        return $this->devisStatutId;
    }

    public function setDevisStatutId(int $devisStatutId): self
    {
        $this->devisStatutId = $devisStatutId;

        return $this;
    }


}
