<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv")
 * @ORM\Entity
 */ 
class Rdv
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Planning", inversedBy="rdv")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planning;

     /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180, unique=false)
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string", length=180, unique=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20, unique=false)
     */
    private $heureCreneau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanning(): ?Planning
    {
        return $this->planning;
    }

    public function setPlanning(Planning $planning): self
    {
        $this->planning = $planning;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHeureCreneau(): ?string
    {
        return $this->heureCreneau;
    }

    public function setHeureCreneau(string $heureCreneau): self
    {
        $this->heureCreneau = $heureCreneau;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }


}
