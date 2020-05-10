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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenements", inversedBy="evenements_salaries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenementId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salaries", inversedBy="evenements_salaries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salarieId;

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
