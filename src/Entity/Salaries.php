<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class Salaries extends User
{
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprises", inversedBy="salaries")
     * @ORM\JoinColumn(nullable=true)
     */
    private $entreprise;

    public function getEntreprise(): ?Entreprises
    {
        return $this->entreprise;
    }

    public function setEntreprise(Entreprises $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_SALARIES';

        return array_unique($roles);
    }
    
}