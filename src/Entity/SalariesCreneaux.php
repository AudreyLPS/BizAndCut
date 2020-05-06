<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalariesCreneaux
 *
 * @ORM\Table(name="salaries_creneaux")
 * @ORM\Entity
 */
class SalariesCreneaux
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_salaries_creneaux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSalariesCreneaux;

    /**
     * @var int
     *
     * @ORM\Column(name="evenement_id", type="integer", nullable=false)
     */
    private $evenementId;

    /**
     * @var int
     *
     * @ORM\Column(name="horaires_salarie_creneau", type="integer", nullable=false)
     */
    private $horairesSalarieCreneau;

    public function getIdSalariesCreneaux(): ?int
    {
        return $this->idSalariesCreneaux;
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

    public function getHorairesSalarieCreneau(): ?int
    {
        return $this->horairesSalarieCreneau;
    }

    public function setHorairesSalarieCreneau(int $horairesSalarieCreneau): self
    {
        $this->horairesSalarieCreneau = $horairesSalarieCreneau;

        return $this;
    }


}
