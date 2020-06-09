<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Admins extends User
{
   /**
     * @ORM\Column(type="boolean")
     */
    private $notif;

    public function getNotif(): ?bool
    {
        return $this->notif;
    }

    public function setNotif(bool $notif): self
    {
        $this->notif = $notif;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADMINS';

        return array_unique($roles);
    }
}
