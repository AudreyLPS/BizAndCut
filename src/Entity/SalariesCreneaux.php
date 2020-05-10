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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenements", inversedBy="salaries_creneaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenementId;

     /**
     * @ORM\Column(type="integer")
     */
    private $horairesSalarieCreneau;

    public function getId(): ?int
    {
        return $this->id;
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
