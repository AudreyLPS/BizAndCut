<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvenementsEntreprises
 *
 * @ORM\Table(name="evenements_entreprises")
 * @ORM\Entity
 */
class EvenementsEntreprises
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
    private $evenementId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="evenements_entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entrepriseId;

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

    public function getEntrepriseId(): ?int
    {
        return $this->entrepriseId;
    }

    public function setEntrepriseId(int $entrepriseId): self
    {
        $this->entrepriseId = $entrepriseId;

        return $this;
    }


}
