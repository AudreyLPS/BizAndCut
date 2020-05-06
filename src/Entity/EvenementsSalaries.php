<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvenementsSalaries
 *
 * @ORM\Table(name="evenements_salaries")
 * @ORM\Entity
 */
class EvenementsSalaries
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_evenements_salaries", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenementsSalaries;

    /**
     * @var int
     *
     * @ORM\Column(name="evenement_id", type="integer", nullable=false)
     */
    private $evenementId;

    /**
     * @var int
     *
     * @ORM\Column(name="salarie_id", type="integer", nullable=false)
     */
    private $salarieId;

    public function getIdEvenementsSalaries(): ?int
    {
        return $this->idEvenementsSalaries;
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

    public function getSalarieId(): ?int
    {
        return $this->salarieId;
    }

    public function setSalarieId(int $salarieId): self
    {
        $this->salarieId = $salarieId;

        return $this;
    }


}
