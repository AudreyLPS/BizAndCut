<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoiffeursCreneaux
 *
 * @ORM\Table(name="coiffeurs_creneaux")
 * @ORM\Entity
 */
class CoiffeursCreneaux
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_coiffeurs_creneaux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCoiffeursCreneaux;

    /**
     * @var int
     *
     * @ORM\Column(name="evenement_id", type="integer", nullable=false)
     */
    private $evenementId;

    /**
     * @var int
     *
     * @ORM\Column(name="coiffeur_id", type="integer", nullable=false)
     */
    private $coiffeurId;

    /**
     * @var int
     *
     * @ORM\Column(name="horaires_coiffeur_creneau", type="integer", nullable=false)
     */
    private $horairesCoiffeurCreneau;

    public function getIdCoiffeursCreneaux(): ?int
    {
        return $this->idCoiffeursCreneaux;
    }

    public function getEvenementId(): ?int
    {
        return $this->evenementId;
    }

    public function setEvenementId(int $evenementId): self
    {
        $this->evenementId = $evenementId;

        return $this;
    }

    public function getCoiffeurId(): ?int
    {
        return $this->coiffeurId;
    }

    public function setCoiffeurId(int $coiffeurId): self
    {
        $this->coiffeurId = $coiffeurId;

        return $this;
    }

    public function getHorairesCoiffeurCreneau(): ?int
    {
        return $this->horairesCoiffeurCreneau;
    }

    public function setHorairesCoiffeurCreneau(int $horairesCoiffeurCreneau): self
    {
        $this->horairesCoiffeurCreneau = $horairesCoiffeurCreneau;

        return $this;
    }


}
