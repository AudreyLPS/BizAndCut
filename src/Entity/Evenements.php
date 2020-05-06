<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_evenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_evenement", type="date", nullable=false)
     */
    private $dateEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_d_evenement", type="string", length=10, nullable=false)
     */
    private $heureDEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_f_evenement", type="string", length=10, nullable=false)
     */
    private $heureFEvenement;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_coiffeurs_evenement", type="smallint", nullable=false, options={"default"="1"})
     */
    private $nbCoiffeursEvenement = '1';

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getHeureDEvenement(): ?string
    {
        return $this->heureDEvenement;
    }

    public function setHeureDEvenement(string $heureDEvenement): self
    {
        $this->heureDEvenement = $heureDEvenement;

        return $this;
    }

    public function getHeureFEvenement(): ?string
    {
        return $this->heureFEvenement;
    }

    public function setHeureFEvenement(string $heureFEvenement): self
    {
        $this->heureFEvenement = $heureFEvenement;

        return $this;
    }

    public function getNbCoiffeursEvenement(): ?int
    {
        return $this->nbCoiffeursEvenement;
    }

    public function setNbCoiffeursEvenement(int $nbCoiffeursEvenement): self
    {
        $this->nbCoiffeursEvenement = $nbCoiffeursEvenement;

        return $this;
    }


}
