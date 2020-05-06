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
     * @var int
     *
     * @ORM\Column(name="id_evenements_entreprises", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenementsEntreprises;

    /**
     * @var int
     *
     * @ORM\Column(name="evenement_id", type="integer", nullable=false)
     */
    private $evenementId;

    /**
     * @var int
     *
     * @ORM\Column(name="entreprise_id", type="integer", nullable=false)
     */
    private $entrepriseId;

    public function getIdEvenementsEntreprises(): ?int
    {
        return $this->idEvenementsEntreprises;
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
