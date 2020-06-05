<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\CoiffeursCreneaux;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method CoiffeursCreneaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoiffeursCreneaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoiffeursCreneaux[]    findAll()
 * @method CoiffeursCreneaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class CoiffeursCreneauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoiffeursCreneaux::class);
    }

    
}
