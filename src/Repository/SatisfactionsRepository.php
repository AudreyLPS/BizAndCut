<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Satisfaction;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Satisfactions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Satisfactions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Satisfactions[]    findAll()
 * @method Satisfactions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class SatisfactionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Satisfaction::class);
    }

    
}
