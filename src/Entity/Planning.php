<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning")
 * @ORM\Entity
 */
class Planning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\OneToOne(targetEntity="App\Entity\Evenements", inversedBy="planning")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?Evenements
    {
        return $this->evenement;
    }

    public function setEvenement(Evenements $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }
}
