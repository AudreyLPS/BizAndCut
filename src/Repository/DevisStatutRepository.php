<?php

namespace App\Repository;

use App\Entity\DevisStatut;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method DevisStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevisStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevisStatut[]    findAll()
 * @method DevisStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class DevisStatutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevisStatut::class);
    }

}
