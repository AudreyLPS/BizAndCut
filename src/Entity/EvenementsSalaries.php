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
    private $evenement;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?int
    {
        return $this->evenement;
    }

    public function setEvenement(int $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }
}
