<?php

namespace App\Repository;

use App\Entity\Admins;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Admins|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admins|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admins[]    findAll()
 * @method Admins[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class AdminsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Admins::class);
    }

}
